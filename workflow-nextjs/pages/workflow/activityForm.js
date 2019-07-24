import { useRouter } from 'next/router';
import Link from 'next/link';
import { ApiClient as WorkflowApiClient, DefaultApi as WorkflowApi} from '@ilb/workflow-api/dist';
import config from '../../conf/config';

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
    const data = await new WorkflowApi().getActivityForm1(activityInstanceId, processInstanceId, {xRemoteUser: context.headers ? context.headers['x-remote-user'] : config.user} );
    //console.log('data',data);
    return data;
};

export default ActivityForm;
