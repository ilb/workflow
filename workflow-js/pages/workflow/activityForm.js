import PropTypes from 'prop-types';
import Layout from '../../components/workflow/Layout';
import ActivityFormComponent from '../../components/workflow/ActivityForm';

const ActivityForm = ({ activityProps, layoutProps }) => {
  return <Layout {...layoutProps}>
    <ActivityFormComponent {...activityProps}/>
  </Layout>;
};

ActivityForm.propTypes = {
  activityProps: PropTypes.object.isRequired,
  layoutProps: PropTypes.object.isRequired,
};

ActivityForm.getInitialProps = async function (context) {
  const activityProps = await ActivityFormComponent.getInitialProps(context);
  const layoutProps = await Layout.getInitialProps(context);
  return { activityProps, layoutProps };
};

export default ActivityForm;
