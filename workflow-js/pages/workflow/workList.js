import PropTypes from 'prop-types';
import Layout from '../../components/workflow/Layout';
import WorkListTable from '../../components/workflow/WorkListTable';

const WorkList = ({ workListProps, layoutProps }) => {
  return <Layout {...layoutProps}>
    <WorkListTable {...workListProps}/>
  </Layout>;
};

WorkList.propTypes = {
  workListProps: PropTypes.object.isRequired,
  layoutProps: PropTypes.object.isRequired,
};

WorkList.getInitialProps = async function (params) {
  const workListProps = await WorkListTable.getInitialProps(params);
  const layoutProps = await Layout.getInitialProps(params);
  return { workListProps, layoutProps };
};

export default WorkList;
