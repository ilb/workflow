import React from 'react';
import PropTypes from 'prop-types';
import { Message, Segment } from 'semantic-ui-react';
import useSubmitHandler from '../../classes/workflow/SubmitHandler';
import { proceedToNextUrl, getActivityInitialProps } from '../../classes/workflow';
import DefaultActivityForm from './DefaultActivityForm';
import { getProcessInstancesApi } from '../../conf/config';


export default function ActivityForm (props) {
  const { dossierData, children } = props;
  const { response: activityFormData, error: activityFormDataError } = props.activityFormData || {};

  if (activityFormDataError || !activityFormData || !activityFormData.activityInstance) {
    return <Message error visible header="Ошибка при получении данных процесса" content={activityFormDataError || 'Нет данных'}/>;
  }

  const { activityInstance } = activityFormData;
  const { id: activityInstanceId, processInstanceId } = activityInstance || {};

  // submit form handler - complete activity
  const { loading, error, submitHandler } = useSubmitHandler(
    async ({ state, processData, beforeAction, callback } = {}) => {
      // do some actions before submit (async)
      if (beforeAction && typeof beforeAction === 'function') {
        const beforeResponse = await beforeAction();
        if (beforeResponse && beforeResponse.error) { return beforeResponse; } // stop here if error
      }

      // define submit method
      const api = getProcessInstancesApi({ proxy: true });
      const method = state || 'completeAndNext'; // default completeAndNext
      const activityMethods = ['complete', 'completeAndNext', 'terminate1', 'abort1'];
      const processMethods = ['terminate', 'abort'];
      if (activityMethods.indexOf(method) === -1 && processMethods.indexOf(method) === -1) { return { error: `Passed invalid state: ${state}` }; }
      const args = processMethods.indexOf(method) !== -1 ? [processInstanceId, { body: processData || {} }]
        : [activityInstanceId, processInstanceId, { body: processData || {} }];
        // call submit with args
      const result = await api[method](...args);

      // proceed to next step
      if (callback && typeof callback === 'function') {
        callback(callback);
      } else {
        proceedToNextUrl(result.response);
      }
      return result;
    }
  );

  const activityProps = {
    activityFormData,
    dossierData,
    submitLoading: loading,
    submitError: error,
    submitHandler,
    activityInstanceId,
    processInstanceId,
  };

  return (
    <Segment loading={loading} basic style={{ padding: 0 }}>
      {!children && <DefaultActivityForm {...activityProps}/>}
      {children && typeof children === 'function' && children(activityProps)}
      {children && typeof children === 'object' && React.cloneElement(children, activityProps)}
    </Segment>
  );
}

ActivityForm.propTypes = {
  activityFormData: PropTypes.object.isRequired,
  dossierData: PropTypes.object,
  children: PropTypes.oneOfType([PropTypes.element, PropTypes.func]),
};

ActivityForm.getInitialProps = async function (context) {
  return getActivityInitialProps(context);
};
