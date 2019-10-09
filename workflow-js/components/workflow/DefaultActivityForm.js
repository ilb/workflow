import PropTypes from 'prop-types';
import JsonSchemaForm from '@bb/jsonschema-form';
import '@bb/datetime-picker/lib/index.css';
import { Step, Message, Segment } from 'semantic-ui-react';

import Dossier from '@ilb/filedossier-js/components/Dossier';
import useSubmitHandler from '../../classes/workflow/SubmitHandler';
import WorkflowResourceClient from '../../classes/workflow/WorkflowResourceClient';
import ActivityFormHandler from '../../classes/workflow/ActivityFormHandler';


/**
* Generated activity form
*/
export default function DefaultActivityForm (props) {
  const { activityFormData, dossierData } = props;
  const activityInstanceId = activityFormData && props.activityFormData.activityInstance && props.activityFormData.activityInstance.id;
  const processInstanceId = activityFormData && props.activityFormData.activityInstance && props.activityFormData.activityInstance.processInstanceId;

  // submit form handler - complete activity
  const completeAndNext = async ({ formData }) => {
    const api = new WorkflowResourceClient();
    const res = await api.completeAndNext({ processInstanceId, activityInstanceId, processData: formData });
    return res;
  };

  const { loading, error, submitHandler } = useSubmitHandler(completeAndNext);

  return (
    <Segment loading={loading}>
      {activityFormData.processStep && <Step.Group
        size='tiny' unstackable
        style={{ overflowX: 'auto' }}
        items={activityFormData.processStep}
      />}
      <JsonSchemaForm
        schema={activityFormData.jsonSchema}
        formData={activityFormData.formData}
        uiSchema={activityFormData.uiSchema}
        onSubmit={submitHandler}
      >
        <div>
          <button id="completeActivity" type="submit" className="ui green button">Выполнить</button>
        </div>
      </JsonSchemaForm>
      {error && <Message error visible header='Ошибка' content={error} />}
      {dossierData && <Dossier dossierData={dossierData} mode="table" header/>}
    </Segment>
  );
}

DefaultActivityForm.propTypes = {
  activityFormData: PropTypes.object.isRequired,
  dossierData: PropTypes.object,
};

DefaultActivityForm.getInitialProps = async function (params) {
  return ActivityFormHandler.getInitialProps(params);
};
