import React from 'react';
import './App.css';
import './Config';
import ActivityFormContainer from './components/ActivityForm';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import ProcessMenuContainer from './components/ProcessMenu';
import ProcessSelectorContainer from './components/ProcessSelector';


function Index() {
    return (<div className="app">
        <Link to="/processInstances/5801_stockvaluation_stockvaluation_fairpricecalc/activityInstances/8302_5801_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_input/activityForm">TEST PROCESS</Link>
        |
        <Link to="/processInstances/5602_stockvaluation_stockvaluation_fairpricecalc/activityInstances/8008_5602_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_check/activityForm">TEST PROCESS2</Link>
        <ProcessSelectorContainer/>
    </div>
            );
}

function ActivityFormIndex( { match }) {
    //console.log('match.params', match.params);
    return (
        <div className="app">
            <Index/>
            <ActivityFormContainer processInstanceId={match.params.processId} activityInstanceId={match.params.activityId}/>
        </div>
    );
}
// <Route path="/processes/:processId" component={ActivityFormIndex} />
function App() {
    return (
            <Router>
                <div>
                    <Route path="/" exact component={Index} />

                    <Route path="/processInstances/:processId/activityInstances/:activityId/activityForm" component={ActivityFormIndex} />
                </div>
            </Router>
            );

}

export default App;
