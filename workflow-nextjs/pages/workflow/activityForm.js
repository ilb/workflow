import { useRouter, useEffect } from 'next/router';
import Link from 'next/link';
import { ProcessInstancesApi } from '@ilb/workflow-api/dist';
import config from '../../conf/config';
import { Button, Step } from 'semantic-ui-react';
import JsonSchemaForm from '@bb/jsonschema-form';
import '@bb/datetime-picker/lib/index.css';
import '@bb/semantic-ui-css/semantic.min.css'
import superagent from "superagent";
import { DefaultApi as DossierApi} from '@ilb/filedossier-api/dist';

//import '@bb/datetime-picker/lib/index.css';
import Dossier from '../../components/Dossier';
import Layout from '../../components/layout'
import { getProcessDefinitions } from '../../components/header'

// function ActivityForm(activityFormData) {
function ActivityForm(props) {
  const activityFormData = props && props.activityFormData;
  console.log('activityFormData props', props);
    const activityInstanceId = props && props.activityFormData && props.activityFormData.activityInstance && props.activityFormData.activityInstance.id;
    const processInstanceId = props && props.activityFormData && props.activityFormData.activityInstance && props.activityFormData.activityInstance.processInstanceId;
    console.log('activityInstanceId, processInstanceId', activityInstanceId, processInstanceId);
    const errorHandler = (data) => {
        alert(data.error);
    };
    const submitHandler = async (data) => {
        console.log('submitting', data.formData);
        const res = await superagent.post(process.env.API_PATH + "/activityForm")
                .query({processInstanceId: processInstanceId, activityInstanceId: activityInstanceId})
                .send(data.formData);
        console.log('submitHandler res', res);
        if (res && res.headers) {
          console.log(res.headers['x-location']);
          document.location=res.headers['x-location'].replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,"http://" + document.location.host + "/workflow");
        }
    };

    // TODO возможно лучше в беке добавить ссылку в activityFormData.processStep.href ?
    // document.location.host  ReferenceError: document is not defined
    // activityForm?processInstanceId=5602_stockvaluation_stockvaluation_fairpricecalc&
    // activityInstanceId=8008_5602_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_check
      // const url = "http://" + document.location.host + "/workflow/activityForm?processInstanceId=" + processInstanceId + "&activityInstancesId=/";
      // console.log('path', router.pathname, process);
      // TODO поменять на Link
      const url = "/workflow/activityForm?processInstanceId=" + processInstanceId + "&activityInstanceId=";
      activityFormData && activityFormData.processStep && activityFormData.processStep.forEach(el => {
        if (el.activityId !== activityInstanceId) {
          el.href = url + el.activityId;
        }
        // active - выделяем активный шаг
        if (el.activityId === activityInstanceId) {
          el.active = true;
        } else {
          el.active = false;
        }
      });

    return <Layout {...props}><div className="activityForm">
        <Step.Group items={activityFormData.processStep}/>

        <JsonSchemaForm
            schema={activityFormData.jsonSchema}
            formData={activityFormData.formData}
            uiSchema={activityFormData.uiSchema}
            onSubmit={submitHandler}
            >
            <div logg={console.log('activityFormData.activityInstance && activityFormData.activityInstance.state.open', activityFormData.activityInstance && activityFormData.activityInstance.state.open)}>
                { ((activityFormData.activityInstance && activityFormData.activityInstance.state.open) || true) &&
                    <button type="submit" className="ui green button">Выполнить</button>
                }
            </div>
        </JsonSchemaForm>
        { activityFormData.dossierData && <Dossier {...activityFormData.dossierData}/> }


    </div></Layout>;
}


ActivityForm.getInitialProps = async function ({query,req}) {
    const headers = req ? req.headers : {};
    const processInstanceId = query.processInstanceId;
    const activityInstanceId = query.activityInstanceId;
    const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const activityFormData = await api.getActivityForm(activityInstanceId, processInstanceId);
    const apiDossier=new DossierApi(config.dossierApiClient(headers ? headers['x-remote-user'] : null));
    if (activityFormData.activityDossier) {
      const {dossierKey, dossierPackage, dossierCode} = activityFormData.activityDossier;
      activityFormData.dossierData= await apiDossier.getDossier(dossierKey, dossierPackage, dossierCode);
      // TODO добавить в бэк dossierKey, dossierPackage
      activityFormData.dossierData.dossierKey=dossierKey;
      activityFormData.dossierData.dossierPackage=dossierPackage;
    }
    const processDefinitions = await getProcessDefinitions(headers);

    return { activityFormData: activityFormData, processDefinitions };
};

export default ActivityForm;
