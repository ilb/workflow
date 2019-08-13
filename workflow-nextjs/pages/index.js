import Layout from '../components/layout'
import { getProcessDefinitions } from '../components/header'

const Index = (props) => {

    return (
      <Layout {...props}><div></div></Layout>
    )
}

Index.getInitialProps = async function () {
    const processDefinitions = await getProcessDefinitions();

    return { processDefinitions };
};

export default Index;
