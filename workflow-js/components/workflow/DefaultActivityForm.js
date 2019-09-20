import Dossier from '../filedossier/Dossier';
import JsonSchemaForm from '@bb/jsonschema-form';
import { Button, Step, Loader, Message, Segment } from 'semantic-ui-react';

export default function DefaultActivityForm(props) {
    const activityFormData = props && props.activityFormData;

    return <div className="activityForm">
        <Step.Group style={{overflowX: 'auto'}} size='tiny' unstackable items={activityFormData.processStep}/>
        <JsonSchemaForm
            schema={activityFormData.jsonSchema}
            formData={activityFormData.formData}
            uiSchema={activityFormData.uiSchema}
            onSubmit={props && props.submitHandler}
            >
            <div>
                { ((activityFormData.activityInstance && activityFormData.activityInstance.state.open) || true) &&
                    <button type="submit" className="ui green button">Выполнить</button>
                }
            </div>
        </JsonSchemaForm>
        {props.error && <Message error visible header='Ошибка' content={props.error} />}
        {props.dossierData && <Dossier {...props.dossierData}/>}
    </div>
}
