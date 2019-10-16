import Link from 'next/link';
import { Menu } from 'semantic-ui-react';
import ProcessSelector from './ProcessSelector';


const MainMenu = (props) => {
  return <div>
    <Menu>
      <Link href="/workflow/workList">
        <a className="item">Рабочий лист</a>
      </Link>

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
