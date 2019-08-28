import Layout from '../components/layout';
import { getProcessDefinitions } from '../components/header';

const Index = (props) => {

    return (
      <Layout {...props}><div></div></Layout>
    )
}

Index.getInitialProps = async function ({req}) {
    const headers = req ? req.headers : {};
    const processDefinitions = await getProcessDefinitions(headers);

    return { processDefinitions };
};

export default Index;
