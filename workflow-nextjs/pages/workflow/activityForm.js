import { useRouter } from 'next/router';
import Link from 'next/link';
import { ApiClient as WorkflowApiClient, DefaultApi as WorkflowApi} from '@ilb/workflow-api/dist';
import '../../conf/apiconfig';

function ActivityForm() {

    return <div>Welcome to Next.js (activity)!
        <Link href="workList">
        <a>workList</a>
        </Link>
    </div>;
}

ActivityForm.getInitialProps = async function (context) {
    const processInstanceId = context.query.processInstanceId;
    const activityInstanceId = context.query.activityInstanceId;
    const data =  await new WorkflowApi().getActivityForm(activityInstanceId, processInstanceId);
    //console.log('data',data);
    return data;
};

export default ActivityForm;
