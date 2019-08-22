import React from 'react';
import Header from './header';
import { Segment } from 'semantic-ui-react';
import NotificationSystem from 'react-notification-system';


const layoutStyle = {
  margin: 0,
  padding: 0,
  // border: '1px solid #DDD'
}


export default class Layout extends React.Component {

  notificationSystem = null;

  componentDidMount() {
      this.notificationSystem = this.refs.notificationSystem;
  }

  showPopup = ({ title, message, type, autoDismiss, children, position = 'tl' }) => {
  return this.notificationSystem.addNotification({
    title, message, level: type, position, children,
    autoDismiss: autoDismiss || 0, dismissible: 'button',
  });
};


  render () {

  return <div style={layoutStyle}>
      <NotificationSystem ref="notificationSystem" />
      <Header {...this.props} showPopup={this.showPopup}/>
      <Segment style={{ marginTop: '50px' }} loading={this.props.loader}>
        {this.props.children}
      </Segment>
    </div>;
  }
}
