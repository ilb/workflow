// import Link from 'next/link';
import { Menu } from 'semantic-ui-react';
import ProcessSelector from './ProcessSelector';


const MainMenu = (props) => {
  return <div>
    <Menu>
      {/* <Menu.Item> TODO use next/link, fix error on request
        <Link href="/workflow/workList"><a>Рабочий лист</a></Link>
      </Menu.Item> */}
      <Menu.Item
        name="Рабочий лист"
        href="/workflow/workList"
      />
      <ProcessSelector
        {...props}
      />
    </Menu>
  </div>;
};

MainMenu.getInitialProps = async function (params) {
  return ProcessSelector.getInitialProps(params);
};


export default MainMenu;
