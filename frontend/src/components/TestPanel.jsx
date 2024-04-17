import axios from "axios";
import config from "models/config.js";
import { useEffect, useState } from "react";
import { Button } from "react-bootstrap";

const TestPanel = (props) => {
    const [tests, setTests] = useState([]);

    useEffect(() => {
        axios.get(config.serverUrl + 'tests/category/' + props.category)
            .then(response => {
                setTests(response.data)
            })
            .catch(error => { });
    }, [props.category]);
    return tests.map((e, i) => (
        <QuestionPanel key={i} test={e} />
    ))
}

const QuestionPanel = (props) => {
    const [answer, setAnswer] = useState(undefined);
    const test = props.test;

    useEffect(() => {
        setAnswer(undefined)
        console.log('Answers cleaned')
    }, [test])


    const handleSelectAnswer = (selectedAnswer) => {
        if (answer === undefined) {
            setAnswer(selectedAnswer)
            console.log('setAnswer', selectedAnswer)
        }
    }

    const getColor = (id) => {
        if (answer === undefined || answer !== id)
            return 'light';
        if (answer === id) {
            if (test.correct === answer) {
                return 'success'
            } else {
                return 'danger'
            }
        }
    }
    return (

        <div className="card card-default mb-3">
            <div className="card-header">
                <div><b>{test.question}</b></div>
            </div>
            <div className="card-body">
                <div className="row">
                    <div className="col-12 col-md-6" style={{ "padding": "2px"}}><Button variant={getColor(1)} className="col-12" size="sm" onClick={(e) => handleSelectAnswer(1)}>{test.answer1}</Button></div>
                    <div className="col-12 col-md-6" style={{ "padding": "2px"}}><Button variant={getColor(2)} className="col-12" size="sm" onClick={(e) => handleSelectAnswer(2)}>{test.answer2}</Button></div>
                    <div className="col-12 col-md-6" style={{ "padding": "2px"}}><Button variant={getColor(3)} className="col-12" size="sm" onClick={(e) => handleSelectAnswer(3)}>{test.answer3}</Button></div>
                    <div className="col-12 col-md-6" style={{ "padding": "2px"}}><Button variant={getColor(4)} className="col-12" size="sm" onClick={(e) => handleSelectAnswer(4)}>{test.answer4}</Button></div>
                </div>
            </div>
        </div>

    )
}


export default TestPanel;