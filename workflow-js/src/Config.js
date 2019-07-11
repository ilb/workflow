import { ApiClient as WorkflowApiClient} from '@ilb/workflow-api/dist';
import { ApiClient as DossierApiClient} from '@ilb/filedossier-api/dist';

WorkflowApiClient.instance.basePath = '/workflow-web/web/v2';
DossierApiClient.instance.basePath = '/workflow-web/web/v2';
