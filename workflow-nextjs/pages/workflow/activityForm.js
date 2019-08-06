import { useRouter } from 'next/router';
import Link from 'next/link';
import { ProcessInstancesApi } from '@ilb/workflow-api/dist';
import config from '../../conf/config';
import { Button, Step } from 'semantic-ui-react';
import JsonSchemaForm from '@bb/jsonschema-form';
import '@bb/datetime-picker/lib/index.css';
import '@bb/semantic-ui-css/semantic.min.css'
import superagent from "superagent";
//import '@bb/datetime-picker/lib/index.css';
//import Dossier from '@ilb/filedossier-js/lib/Dossier';

function ActivityForm(activityFormData) {
  // console.log('activityFormData', activityFormData);
    const activityInstanceId = activityFormData.activityInstance && activityFormData.activityInstance.id;
    const processInstanceId = activityFormData.activityInstance && activityFormData.activityInstance.processInstanceId;

    const errorHandler = (data) => {
        alert(data.error);
    };
    const submitHandler = async (data) => {
        console.log('submitting', data.formData);
        const res = await superagent.post(process.env.API_PATH + "/activityForm")
                .query({processInstanceId: processInstanceId, activityInstanceId: activityInstanceId})
                .send(data.formData);
        console.log('submitHandler res', res);

//        api.completeAndNext(activityInstanceId, processInstanceId, {body: data.formData})
//                .then(act => document.location = act.activityFormUrl.replace(/https:\/\/devel.net.ilb.ru\/workflow-js/, "http://" + document.location.host))
//                .catch(errorHandler);

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
                { (activityFormData.activityInstance && activityFormData.activityInstance.state.open) || true &&
                    <button type="submit" className="ui green button">Выполнить</button>
                }
            </div>
        </JsonSchemaForm>


    </div>;
}

ActivityForm.getInitialProps = async function ( {query, headers}) {
    const processInstanceId = query.processInstanceId;
    const activityInstanceId = query.activityInstanceId;
    const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const data = await api.getActivityForm(activityInstanceId, processInstanceId);
    console.log('data',data);
    return data;
};

export default ActivityForm;
