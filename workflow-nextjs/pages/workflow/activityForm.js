import { useRouter, useEffect } from 'next/router';
import React, { useState } from 'react';
import Link from 'next/link';
import { ProcessInstancesApi } from '@ilb/workflow-api/dist';
import config from '../../conf/config';
import { Button, Step, Loader, Message } from 'semantic-ui-react';
import JsonSchemaForm from '@bb/jsonschema-form';
import '@bb/datetime-picker/lib/index.css';
import '@bb/semantic-ui-css/semantic.min.css'
import superagent from "superagent";
import { DefaultApi as DossierApi} from '@ilb/filedossier-api/dist';

//import '@bb/datetime-picker/lib/index.css';
import Dossier from '../../components/Dossier';
import Layout from '../../components/layout';
import { getProcessDefinitions } from '../../components/header';


function ActivityForm(props) {
  const [{ loading, error }, setSubmitState] = useState({ loading: false, error: null });

  const activityFormData = props && props.activityFormData;
  console.log('activityFormData props', props);
    const activityInstanceId = props && props.activityFormData && props.activityFormData.activityInstance && props.activityFormData.activityInstance.id;
    const processInstanceId = props && props.activityFormData && props.activityFormData.activityInstance && props.activityFormData.activityInstance.processInstanceId;
    console.log('activityInstanceId, processInstanceId', activityInstanceId, processInstanceId);
    const errorHandler = (data) => {
        alert(data.error);
    };
    const submitHandler = async (data) => {
        if (!data) {
          setSubmitState({ loading: false, error: 'нет данных для отправки' });
        }

        setSubmitState({ loading: true });
        console.log('submitting', data.formData);
        try {
          const res = await superagent.post(process.env.API_PATH + "/activityForm")
            .query({processInstanceId: processInstanceId, activityInstanceId: activityInstanceId})
            .send(data.formData);
          if (res && (res.statusText !== "OK" || !res.headers)) {
            console.log('submitHandler res', res);
            setSubmitState({ loading: false, error: res.status + ' ' + res.statusText });
          } else {
              console.log('res1', res);
              console.log(res.headers['x-location']);
              setSubmitState({ loading: false });
              document.location=res.headers['x-location'].replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,document.location.origin + "/workflow");
              // document.location = res.headers['x-location'].replace('/workflow-js/', '/workflow/');
          }
        } catch (e) {
          console.log('e e.message', e, e.message);
          setSubmitState({ loading: false, error: e.status + ' ' + e.message });
        }
    };

      return <Layout {...props} loader={loading}>
        <div className="activityForm">

          <Step.Group items={activityFormData.processStep}/>

          <JsonSchemaForm
              schema={activityFormData.jsonSchema}
              formData={activityFormData.formData}
              uiSchema={activityFormData.uiSchema}
              onSubmit={submitHandler}
              >
              <div>
                  { ((activityFormData.activityInstance && activityFormData.activityInstance.state.open) || true) &&
                      <button type="submit" className="ui green button">Выполнить</button>
                  }
              </div>
          </JsonSchemaForm>
          <div style={{ margin: '0.5rem' }}>{error && <Message error visible header='Ошибка' content={error} />}</div>
          {activityFormData.dossierData && <Dossier {...activityFormData.dossierData}/>}

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
    console.log('ActivityForm.getInitialProps processDefinitions', processDefinitions);


    // TODO поменять на Link
    const url = "/workflow/activityForm?processInstanceId=" + processInstanceId + "&activityInstanceId=";
    activityFormData && activityFormData.processStep && activityFormData.processStep.forEach(el => {
      // добавляем url для переключения между стадиями процесса
      if (el.activityId !== activityInstanceId) {
        el.href = url + el.activityId;
      }
      // active - выделяем активный шаг
      el.active = el.activityId === activityInstanceId;
    });

    return { activityFormData: activityFormData, processDefinitions };
};

export default ActivityForm;
