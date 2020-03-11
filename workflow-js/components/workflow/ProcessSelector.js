import React, { useEffect } from 'react';
import PropTypes from 'prop-types';
import { Dropdown } from 'semantic-ui-react';
import { getProcessDefinitionsApi } from '../../conf/config';
import useSubmitHandler from '../../classes/workflow/SubmitHandler';
import { createProcessInstanceAndNext } from '../../classes/workflow';

const ProcessSelector = (props) => {
  const { showPopup, processDefinitions } = props;
  const { response, error: pdError } = processDefinitions;
  const processes = response && response.processDefinition;

  const startProcess = (event, { value }) => (createProcessInstanceAndNext({ processDefinitionId: value }));
  const { loading, error, submitHandler } = useSubmitHandler(startProcess);

  // popup на ошибки в getProcessDefinitions
  useEffect(() => {
    if (pdError) {
      showPopup({ title: 'Ошибка при получении списка процессов', message: pdError, type: 'error', position: 'tr', autoDismiss: '30' });
    }
  }, [pdError]);

  // popup на ошибки в startProcess
  useEffect(() => {
    if (error) {
      showPopup({ title: 'Ошибка при запуске процесса', message: error, type: 'error', position: 'tr', autoDismiss: '30' });
      // setSubmitState({ loading: false, error: null }); // reset error
    }
  }, [error]);

  return (
    <Dropdown loading={loading}
      simple item
      text="Запустить процесс"
    >
      <Dropdown.Menu>
        {(processes || []).map((pd) => (
          <Dropdown.Item
            id={'start_' + pd.id}
            key={pd.id}
            text={pd.definitionName}
            value={pd.id}
            onClick={submitHandler}
          />
        ))}
      </Dropdown.Menu>
    </Dropdown>
  );
};

ProcessSelector.propTypes = {
  processDefinitions: PropTypes.object.isRequired,
  showPopup: PropTypes.func.isRequired,
};

ProcessSelector.getInitialProps = async function ({ req }) {
  const api = getProcessDefinitionsApi({ req, proxy: true });
  const processDefinitions = await api.getProcessDefinitions({ enabled: true });
  return { processDefinitions };
};

export default ProcessSelector;
