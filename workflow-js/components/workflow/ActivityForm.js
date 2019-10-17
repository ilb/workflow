import React from 'react';
import PropTypes from 'prop-types';
import { Message, Segment } from 'semantic-ui-react';
import useSubmitHandler from '../../classes/workflow/SubmitHandler';
import { completeAndNext, getActivityInitialProps } from '../../classes/workflow';
import DefaultActivityForm from './DefaultActivityForm';


export default function ActivityForm (props) {
  const { dossierData, children } = props;
  const { response: activityFormData, error: activityFormDataError } = props.activityFormData || {};

  if (activityFormDataError || !activityFormData || !activityFormData.activityInstance) {
    return <Message error visible header="Ошибка при получении данных процесса" content={activityFormDataError || 'Нет данных'}/>;
  }

  const { activityInstance } = activityFormData;
  const { id: activityInstanceId, processInstanceId } = activityInstance || {};

  // submit form handler - complete activity
  const { loading, error, submitHandler } = useSubmitHandler(({ processData } = {}) => (
    completeAndNext({ processInstanceId, activityInstanceId, processData })
  ));

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
      {children && React.cloneElement(children, activityProps)}
    </Segment>
  );
}

ActivityForm.propTypes = {
  activityFormData: PropTypes.object.isRequired,
  dossierData: PropTypes.object,
  children: PropTypes.element,
};

ActivityForm.getInitialProps = async function (context) {
  return getActivityInitialProps(context);
};
