import { useRouter } from 'next/router';
import Link from 'next/link';
import { ApiClient as WorkflowApiClient, DefaultApi as WorkflowApi} from '@ilb/workflow-api/dist';
import config from '../../conf/config';
import { Button, Step } from 'semantic-ui-react';
import JsonSchemaForm from '@bb/jsonschema-form';
import '@bb/semantic-ui-css/semantic.min.css'
//import '@bb/datetime-picker/lib/index.css';
//import Dossier from '@ilb/filedossier-js/lib/Dossier';

function ActivityForm(activityFormData) {
    const api = new WorkflowApi();
    const activityInstanceId = activityFormData.activityInstance.id;
    const processInstanceId = activityFormData.activityInstance.processInstanceId;

    const errorHandler = (data) => {
        alert(data.error);
    };
    const submitHandler = (data) => {
        console.log('submitting', data.formData);
        api.completeAndNext(activityInstanceId, processInstanceId, {body: data.formData})
                .then(act => document.location = act.activityFormUrl.replace(/https:\/\/devel.net.ilb.ru\/workflow-js/, "http://" + document.location.host))
                .catch(errorHandler);

    };

    return <div className="activityForm">
        <Step.Group items={activityFormData.processStep}/>
        
        <JsonSchemaForm
            schema={activityFormData.jsonSchema}
            formData={activityFormData.formData}
            uiSchema={activityFormData.uiSchema}
            onSubmit={submitHandler}
            >
            <div>
                { activityFormData.activityInstance.state.open &&
                    <button type="submit" className="ui green button">Выполнить</button>
                }
            </div>
        </JsonSchemaForm>


    </div>;
}

ActivityForm.getInitialProps = async function (context) {
    const processInstanceId = context.query.processInstanceId;
    const activityInstanceId = context.query.activityInstanceId;
    const data = await new WorkflowApi().getActivityForm1(activityInstanceId, processInstanceId, {xRemoteUser: context.headers ? context.headers['x-remote-user'] : config.user});
    //console.log('data',data);
    return data;
};

export default ActivityForm;
