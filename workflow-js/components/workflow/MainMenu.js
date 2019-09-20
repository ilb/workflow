import Link from 'next/link';
import config from '../../conf/config';
// import React, { useState, useEffect, useRef } from 'react';
import React, { useState, useEffect, useRef } from 'react';
import { Message, Loader, Select, Button, Menu } from 'semantic-ui-react'

import '@bb/semantic-ui-css/semantic.min.css'
import superagent from "superagent";
import './index.css';
import ProcessSelector from './ProcessSelector';


const MainMenu = (props) => {
  return <div>
    <Menu>
        <Menu.Item
          name='Рабочий лист'
          href='/workflow/workList'
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
