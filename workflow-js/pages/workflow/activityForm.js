import Layout from '../../components/workflow/Layout';
import DefaultActivityForm from '../../components/workflow/DefaultActivityForm';

const WorkList = (props) => {
    return <Layout {...props}>
        <DefaultActivityForm {...props}/>
    </Layout>;
}

export default WorkList;


WorkList.getInitialProps = async function (params) {
    const props = await DefaultActivityForm.getInitialProps(params);
    const propsLayout = await Layout.getInitialProps(params);
    return {...props, ...propsLayout};
}
