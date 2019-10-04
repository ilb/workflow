import React, { useState, useEffect } from 'react';
import PropTypes from 'prop-types';
import { Dropdown } from 'semantic-ui-react';
import WorkflowResourceClient from '../../classes/workflow/WorkflowResourceClient';
import config from '../../conf/config';
import { ProcessDefinitionsApi } from '@ilb/workflow-api';

const ProcessSelector = (props) => {
  const { showPopup, processDefinitions } = props;
  const [{ loading, error }, setSubmitState] = useState({ loading: false, error: null });
  useEffect(() => {
    if (error) {
      showPopup({ title: 'Ошибка при запуске процесса', message: error, type: 'error', position: 'tr', autoDismiss: '30' });
      setSubmitState({ loading: false, error: null }); // reset error
    }
  }, [error]);

  const startProcess = async (event, { value: processDefinitionId }) => {
    if (!processDefinitionId) {
      setSubmitState({ loading: false, error: 'Не указан идентификатор процесса' });
      return;
    }
    setSubmitState({ loading: true, error: null }); // reset error important
    try {
      const api = new WorkflowResourceClient();
      const res = await api.createProcessInstanceAndNext({ processDefinitionId });

      if (res && (res.statusText !== 'OK' || !res.headers)) {
        setSubmitState({ loading: false, error: res.status + ' ' + res.statusText });
      } else {
        setSubmitState({ loading: false });
        document.location = res.headers['x-location'];
      }
    } catch (e) {
      setSubmitState({ loading: false, error: e.status + ' ' + e.message });
    }
  };

  return (
    <Dropdown loading={loading}
      simple item
      text="Запустить процесс"
    >
      <Dropdown.Menu>
        {(processDefinitions || []).map((pd) => (
          <Dropdown.Item
            key={pd.id}
            text={pd.definitionName}
            value={pd.id}
            onClick={startProcess}
          />
        ))}
      </Dropdown.Menu>
    </Dropdown>
  );
};

ProcessSelector.propTypes = {
  processDefinitions: PropTypes.array,
  showPopup: PropTypes.func.isRequired,
};

ProcessSelector.getInitialProps = async function ({ req }) {
  const headers = req ? req.headers : {};
  const api = new ProcessDefinitionsApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
  const { processDefinition: processDefinitions } = await api.getProcessDefinitions({ enabled: true });
  return { processDefinitions };
};

export default ProcessSelector;
