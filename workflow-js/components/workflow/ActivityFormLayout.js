import { useRouter, useEffect } from 'next/router';
import React, { useState } from 'react';
import Link from 'next/link';
import { ProcessInstancesApi } from '@ilb/workflow-api';
import config from '../../conf/config';
import { Button, Step, Loader, Message, Segment } from 'semantic-ui-react';
import JsonSchemaForm from '@bb/jsonschema-form';
import '@bb/datetime-picker/lib/index.css';
import 'semantic-ui-css/semantic.min.css'
import WorkflowResourceClient from '../../classes/workflow/WorkflowResourceClient';
import { DossiersApi} from '@ilb/filedossier-api';

//import '@bb/datetime-picker/lib/index.css';
import Dossier from '../filedossier/Dossier';
import Layout from './Layout';
import DefaultActivityForm from './DefaultActivityForm';

/**
 * displays activity from with controls
 * will show default form if no children elements supplied
 * @param {type} props
 * @return {ActivityFormLayout.props2}
 */
function ActivityFormLayout(props) {
    const [{loading, error}, setSubmitState] = useState({loading: false, error: null});

    const activityFormData = props && props.activityFormData;
    const activityInstanceId = props && props.activityFormData && props.activityFormData.activityInstance && props.activityFormData.activityInstance.id;
    const processInstanceId = props && props.activityFormData && props.activityFormData.activityInstance && props.activityFormData.activityInstance.processInstanceId;

    const submitHandler = async (data) => {
        if (!data) {
            setSubmitState({loading: false, error: 'нет данных для отправки'});
        }

        setSubmitState({loading: true});
        try {
            const api = new WorkflowResourceClient();
            const res = await api.completeAndNext({processInstanceId,activityInstanceId,processData:data.formData});
            if (res && (res.statusText !== "OK" || !res.headers)) {
                setSubmitState({loading: false, error: res.status + ' ' + res.statusText});
            } else {
                setSubmitState({loading: false});
                document.location = res.headers['x-location'].replace(/https:\/\/devel.net.ilb.ru\/workflow-js/, document.location.origin + "/workflow");
                // document.location = res.headers['x-location'].replace('/workflow-js/', '/workflow/');
            }
        } catch (e) {
            setSubmitState({loading: false, error: e.status + ' ' + e.message});
        }
    };
//FIXME
    const props2 = {...props, submitHandler, error}
    return <Layout {...props} loader={loading}>
        {props.children ? props.children : <DefaultActivityForm {...props2}/>}
    </Layout>;
}


ActivityFormLayout.getInitialProps = async function (params) {
    const {query, req} = params;
    const headers = req ? req.headers : {};
    const processInstanceId = query.processInstanceId;
    const activityInstanceId = query.activityInstanceId;
    const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const activityFormData = await api.getActivityForm(activityInstanceId, processInstanceId);
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

    const props = {activityFormData};
    let propsDossier = {};

    if (activityFormData.activityDossier) {
        propsDossier = await Dossier.getInitialProps({query: activityFormData.activityDossier, req});
    }

    console.log('propsDossier', propsDossier);


    const propsLayout = await Layout.getInitialProps(params);
    //console.log('propsLayout', propsLayout);

    return {...props, ...propsLayout, ...propsDossier};
};

export default ActivityFormLayout;
