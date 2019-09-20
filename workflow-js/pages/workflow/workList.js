
import Layout from '../../components/workflow/Layout';
import WorkListTable from '../../components/workflow/WorkListTable';

const WorkList = (props) => {
    return <Layout {...props}>
        <WorkListTable {...props}/>
    </Layout>;
}

export default WorkList;


WorkList.getInitialProps = async function (params) {
    const props = await WorkListTable.getInitialProps(params);
    const propsLayout = await Layout.getInitialProps(params);
    return {...props, ...propsLayout};
}
