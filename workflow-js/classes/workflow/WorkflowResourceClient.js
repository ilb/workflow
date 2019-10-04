import superagent from 'superagent';

export default class WorkflowResourceClient {
  async completeAndNext ({ processInstanceId, activityInstanceId, processData }) {
    const res = superagent.post(process.env.API_PATH + '/workflow')
      .query({ method: 'completeAndNext', processInstanceId, activityInstanceId })
      .send(processData || {});
    return res;
  }

  async createProcessInstanceAndNext ({ processDefinitionId, processData }) {
    const res = superagent.post(process.env.API_PATH + '/workflow')
      .query({ method: 'createProcessInstanceAndNext', processDefinitionId })
      .send(processData || {});
    return res;
  }
}
