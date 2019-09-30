import Dossier from '../filedossier/Dossier';
import JsonSchemaForm from '@bb/jsonschema-form';
import '@bb/datetime-picker/lib/index.css';
import { Button, Step, Loader, Message, Segment } from 'semantic-ui-react';
import config from '../../conf/config';
import useSubmitHandler from '../../classes/workflow/SubmitHandler';
import WorkflowResourceClient from '../../classes/workflow/WorkflowResourceClient';
import { ProcessInstancesApi } from '@ilb/workflow-api';

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
    const {query, req} = params;
    const headers = req ? req.headers : {};
    const processInstanceId = query.processInstanceId;
    const activityInstanceId = query.activityInstanceId;
    const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const activityFormData = await api.getActivityForm(activityInstanceId, processInstanceId);

    const props = {activityFormData};
    let propsDossier = {};

    if (activityFormData.activityDossier) {
        propsDossier = await Dossier.getInitialProps({query: activityFormData.activityDossier, req});
    }
    return {...props, ...propsDossier};
}
