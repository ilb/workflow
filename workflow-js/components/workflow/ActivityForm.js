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
  const { activityInstance, processInstance } = activityFormData;

  if (activityFormDataError || !activityFormData || !activityInstance) {
    return <Message error visible header="Ошибка при получении данных процесса" content={activityFormDataError || 'Нет данных'}/>;
  }
  if (processInstance.state && !processInstance.state.open) {
    return <Message error visible header="Процесс завершен"/>;
  }
  if (activityInstance.state && !activityInstance.state.open) {
    return <Message error visible header="Активность завершена"/>;
  }

  const { id: activityInstanceId, processInstanceId } = activityInstance || {};

  // submit form handler - complete activity
  const { loading, error, submitHandler } = useSubmitHandler(
    /**
     * Process submit handler
     * @param {string} state - status of current activity/process, default = 'complete'
     * @param {mixed} processData - body to send in method, default empty object
     * @param {function or array} beforeAction - async function or array of async functions that will be called before submitting process
     *     each function prefered to return standart object like { response, error }, in that case submit will be aborted on action errors
     * @param {function} callback - a callback to intercept default behavior
     */
    async ({ state, processData, beforeAction, callback, defaultNextUrl } = {}) => {
      // do some actions before submit (async)
      if (beforeAction) {
        let actionsArray = beforeAction;
        if (typeof actionsArray === 'function') { actionsArray = [actionsArray]; }
        for (let i = 0; i < actionsArray.length; i++) {
          const actionResponse = await actionsArray[i]();
          if (actionResponse && actionResponse.error) { return actionResponse; } // stop here if error
        }
      }

      // define submit method
      const api = getProcessInstancesApi({ proxy: true });
      const method = state || 'completeAndNext'; // default completeAndNext
      const activityMethods = ['complete', 'completeAndNext', 'terminate', 'abort'];
      const processMethods = ['terminate1', 'abort1'];
      if (activityMethods.indexOf(method) === -1 && processMethods.indexOf(method) === -1) { return { error: `Passed invalid state: ${state}` }; }
      const args = processMethods.indexOf(method) !== -1 ? [processInstanceId, { body: processData || {} }]
        : [activityInstanceId, processInstanceId, { body: processData || {} }];
        // call submit with args
      const result = await api[method](...args);

      // proceed to next step
      if (callback && typeof callback === 'function') {
        callback({ result, proceedToNextUrl });
      } else {
        proceedToNextUrl(result, defaultNextUrl);
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
