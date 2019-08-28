import React from 'react';
import Header from './header';
import { Segment } from 'semantic-ui-react';
import NotificationSystem from 'react-notification-system';
import Head from 'next/head';


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
        <Head>
          <meta name="viewport" content="width=device-width, initial-scale=1" />
          <meta charSet="utf-8" />
        </Head>
        <style jsx global>{`
          body, html {
            height: inherit;
          }
          `}</style>
      <NotificationSystem ref="notificationSystem" />
      <Header {...this.props} showPopup={this.showPopup}/>
      <Segment style={{ marginTop: '40px', height: '100vh - 50px' }} loading={this.props.loader}>
        {this.props.children}
      </Segment>
    </div>;
  }
}
