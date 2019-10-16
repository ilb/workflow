import React from 'react';
import PropTypes from 'prop-types';
import JsonSchemaForm from '@bb/jsonschema-form';
import '@bb/datetime-picker/lib/index.css';
import { Step, Divider, Message } from 'semantic-ui-react';
import Dossier from '@ilb/filedossier-js/components/Dossier';


/**
* Generated activity form
*/
export default function DefaultActivityForm (props) {
  const { activityFormData, dossierData, submitError, submitHandler } = props;
  const { processStep, jsonSchema, formData, uiSchema } = activityFormData;

  return (
    <div>
      {processStep && <Step.Group
        size='tiny' unstackable
        style={{ overflowX: 'auto' }}
        items={processStep}
      />}

      <JsonSchemaForm
        schema={jsonSchema}
        formData={formData}
        uiSchema={uiSchema}
        onSubmit={({ formData }) => submitHandler({ processData: formData })}
      >
        <div>
          <button id="completeActivity" type="submit" className="ui green button">Выполнить</button>
        </div>
      </JsonSchemaForm>
      {submitError && <Message error visible header="Ошибка при выполнении операции" content={submitError}/>}

      {dossierData && <React.Fragment>
        <Divider/>
        <Dossier dossierData={dossierData} mode="table" header/>
      </React.Fragment>}
    </div>
  );
}

DefaultActivityForm.propTypes = {
  activityFormData: PropTypes.object.isRequired,
  dossierData: PropTypes.object,
  submitError: PropTypes.string,
  submitHandler: PropTypes.func.isRequired,
};
