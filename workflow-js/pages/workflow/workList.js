import PropTypes from 'prop-types';
import Layout from '../../components/workflow/Layout';
import WorkListTable from '../../components/workflow/WorkListTable';
import config from '../../conf/config';

const WorkList = ({ workListProps, layoutProps }) => {
  return <Layout {...layoutProps}>
    <WorkListTable {...workListProps}/>
  </Layout>;
};

WorkList.propTypes = {
  workListProps: PropTypes.object.isRequired,
  layoutProps: PropTypes.object.isRequired,
};

WorkList.getInitialProps = async function (context) {
  await config.init();
  const workListProps = await WorkListTable.getInitialProps(context);
  const layoutProps = await Layout.getInitialProps(context);
  return { workListProps, layoutProps };
};

export default WorkList;
