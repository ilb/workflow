import config from './config';
import { ApiClient as WorkflowApiClient, DefaultApi as WorkflowApi} from '@ilb/workflow-api/dist';

WorkflowApiClient.instance.basePath = 'https://devel.net.ilb.ru/workflow-web/web/v2';
if (!process.browser) {
    WorkflowApiClient.instance.applyAuthToRequest = (request, authNames) => {
        request.ca(config.ca);
        request.key(config.cert);
        request.cert(config.cert);
        request._passphrase = config.passphrase;
    };
}