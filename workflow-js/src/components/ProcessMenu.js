import React, { useState, useEffect, useRef } from 'react';
import {  Message, Loader, Dropdown, Icon, Menu, Segment } from 'semantic-ui-react'
import { ApiClient, DefaultApi } from 'workflow-api/dist';
import {useResource} from '../ReactHelper';

const items = [
  { key: 'editorials', active: true, name: 'Editorials' },
  { key: 'review', name: 'Reviews' },
  { key: 'events', name: 'Upcoming Events', items: [{ key: 'review2', name: 'Reviews2' }] },
]

const ProcessMenuContainer = () => <Menu items={items} />

export default ProcessMenuContainer;

export function ProcessMenuContainer1() {
    const api = new DefaultApi();
    const [data, getData] = useResource(() => api.getProcessDefinitions());
    useEffect(() => {
        getData();
    }, []);

    return <div className="processMenuContainer">
        {data.loading && <Loader active /> }
        {data.error && <Message error visible content={data.error}/> }
        {data.value && <ProcessMenu />}
    </div>;
 
}

function ProcessMenu() {
    return <div className="processMenu"/>;
}