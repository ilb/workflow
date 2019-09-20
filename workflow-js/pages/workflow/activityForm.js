import ActivityFormLayout from '../../components/workflow/ActivityFormLayout';

export default function activityForm(props) {
        return <ActivityFormLayout {...props} ></ActivityFormLayout>;

}

activityForm.getInitialProps = async function (params) {
    return ActivityFormLayout.getInitialProps(params);
}
