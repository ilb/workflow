import PropTypes from 'prop-types';
import Layout from '../../components/workflow/Layout';
import DefaultActivityForm from '../../components/workflow/DefaultActivityForm';

const ActivityForm = ({ activityProps, layoutProps }) => {
  return <Layout {...layoutProps}>
    <DefaultActivityForm {...activityProps}/>
  </Layout>;
};

ActivityForm.propTypes = {
  activityProps: PropTypes.object.isRequired,
  layoutProps: PropTypes.object.isRequired,
};

ActivityForm.getInitialProps = async function (params) {
  const activityProps = await DefaultActivityForm.getInitialProps(params);
  const layoutProps = await Layout.getInitialProps(params);
  return { activityProps, layoutProps };
};

export default ActivityForm;
