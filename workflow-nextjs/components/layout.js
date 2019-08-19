import Header from './header';
import { Segment } from 'semantic-ui-react';


const layoutStyle = {
  margin: 0,
  padding: 0,
  // border: '1px solid #DDD'
}


export default function Layout(props) {
  return <div style={layoutStyle}>
      <Header {...props}/>
      <Segment loading={props.loader}>
        {props.children}
      </Segment>
    </div>;
}
