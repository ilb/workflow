import 'semantic-ui-css/semantic.min.css';
import React from 'react';
import PropTypes from 'prop-types';
import MainMenu from './MainMenu';
import { Segment } from 'semantic-ui-react';
import NotificationSystem from 'react-notification-system';
import './index.css';


export default class Layout extends React.Component {
  static propTypes = {
    children: PropTypes.element.isRequired,
  };

  showPopup = ({ title, message, type, autoDismiss, children, position = 'tl' }) => {
    return this._notificationSystem.addNotification({
      title, message, level: type, position, children,
      autoDismiss: autoDismiss || 0, dismissible: 'button',
    });
  };

  render () {
    return <div className="page-layout">
      <NotificationSystem ref={ref => { this._notificationSystem = ref; }}/>
      <MainMenu {...this.props} showPopup={this.showPopup}/>
      <Segment basic className="page-content">
        {this.props.children}
      </Segment>
    </div>;
  }

  static async getInitialProps (params) {
    return MainMenu.getInitialProps(params);
  }
}
