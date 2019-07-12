import React from 'react';
import './App.css';
import './Config';
import ActivityFormContainer from './components/ActivityForm';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import ProcessMenuContainer from './components/ProcessMenu';
import ProcessSelectorContainer from './components/ProcessSelector';
import queryString from 'query-string'


function Index() {
    return (<div className="app">
        <Link to="/activityForm?processInstanceId=5801_stockvaluation_stockvaluation_fairpricecalc&activityInstanceId=8302_5801_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_input">TEST PROCESS</Link>
        |
        <Link to="/activityForm?processInstanceId=5602_stockvaluation_stockvaluation_fairpricecalc&activityInstanceId=8008_5602_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_check">TEST PROCESS2</Link>
        <ProcessSelectorContainer/>
    </div>
            );
}

function ActivitFormIndex( { match }) {
    console.log('match', match);
    const values = queryString.parse(match.url)
    console.log('values', values);
    return (
        <div className="app">
            <Index/>
            <ActivityFormContainer processInstanceId={values.processInstanceId} activityInstanceId={values.activityInstanceId}/>
        </div>
    );
}
// <Route path="/processes/:processInstanceId" component={ActivitFormIndex} />
function App() {
    return (
            <Router>
                <div>
                    <Route path="/" exact component={Index} />
                    <Route path="/activityForm" component={ActivitFormIndex} />
                </div>
            </Router>
            );

}

export default App;
