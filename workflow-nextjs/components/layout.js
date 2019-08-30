import React from 'react';
import Header from './header';
import { Segment } from 'semantic-ui-react';
import NotificationSystem from 'react-notification-system';
import './index.css';


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

  return <div className="layoutStyle">
      <NotificationSystem ref="notificationSystem" />
      <Header {...this.props} showPopup={this.showPopup}/>
      <div className="scrollable">
        <Segment basic loading={this.props.loader}>
          {this.props.children}
        </Segment>
      </div>
    </div>;
  }
}
