import React from 'react';
import './App.css';
import ActivityForm from './components/ActivityForm';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";

function Index() {
    return (<div className="app">
        <Link to="/processes/5801_stockvaluation_stockvaluation_fairpricecalc/activities/8302_5801_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_input">TEST PROCESS</Link>
        |
        <Link to="/processes/5602_stockvaluation_stockvaluation_fairpricecalc/activities/8008_5602_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_check">TEST PROCESS2</Link>
    </div>
            );
}

function ProcessIndex( { match }) {
    //console.log('match.params', match.params);
    return (
        <div className="app">
            <Index/>
            <ActivityForm processId={match.params.processId} activityId={match.params.activityId}/>
        </div>
    );
}

function App() {
    return (
            <Router>
                <div>
                    <Route path="/" exact component={Index} />
                    <Route path="/processes/:processId/activities/:activityId" component={ProcessIndex} />
                </div>
            </Router>
            );

}

export default App;
