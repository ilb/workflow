import Dossier from '../filedossier/Dossier';
import JsonSchemaForm from '@bb/jsonschema-form';
import '@bb/datetime-picker/lib/index.css';
import { Button, Step, Loader, Message, Segment } from 'semantic-ui-react';

import useSubmitHandler from '../../classes/workflow/SubmitHandler';
import WorkflowResourceClient from '../../classes/workflow/WorkflowResourceClient';
import ActivityFormHandler from '../../classes/workflow/ActivityFormHandler';


/**
 * Generated activity form
 */
export default function DefaultActivityForm(props) {
    const activityInstanceId = props && props.activityFormData && props.activityFormData.activityInstance && props.activityFormData.activityInstance.id;
    const processInstanceId = props && props.activityFormData && props.activityFormData.activityInstance && props.activityFormData.activityInstance.processInstanceId;

    const activityFormData = props && props.activityFormData;

    // submit form handler - complete activity
    const completeAndNext = async (data) => {
        const api = new WorkflowResourceClient();
        const res = await api.completeAndNext({processInstanceId, activityInstanceId, processData: data.formData});
        return res;
    };

    const {loading, error, submitHandler} = useSubmitHandler(completeAndNext);

    return <div className="activityForm">
        <Segment loading={loading}>
            <Step.Group style={{overflowX: 'auto'}} size='tiny' unstackable items={activityFormData.processStep}/>
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
            {props.dossierData && <Dossier {...props.dossierData}/>}
        </Segment>
    </div>
}

DefaultActivityForm.getInitialProps = async function (params) {
    return ActivityFormHandler.getInitialProps(params);
}
