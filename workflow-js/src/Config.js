//import { ApiClient, DefaultApi } from './openapi/src';
//import ApiClient from './ApiClient';
import { ApiClient, DefaultApi } from 'workflow-api/dist';

//export const processApiClient = null;
//ApiClient.instance = new ApiClient();
console.log('ApiClient.instance',ApiClient.instance);
ApiClient.instance.basePath = '/workflow-web/web/v2';
//export const processApi = new DefaultApi(processApiClient);
