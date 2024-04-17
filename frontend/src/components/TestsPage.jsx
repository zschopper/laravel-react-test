import axios from "axios";
import config from "models/config";
import { useEffect, useState } from "react";
import { Form } from "react-bootstrap";
import TestPanel from "components/TestPanel";

const TestsPage = () => {
    const [categoryId, setCategoryId] = useState(1);
    const [categories, setCategories] = useState([]);
    useEffect(() => {
        axios.get(config.serverUrl + 'categories')
            .then(response => {
                console.log(response.data)
                setCategories(response.data)
            })
            .catch(error => {
                console.warn(error)
            });
    }, [])

    const handleCategoryChange = (e) => {
        const value = e.target.value;
        setCategoryId(value);
    }
    return (
        <>
            <Form.Group className="mb-3" controlId="cidEmail">
                <Form.Label>Category</Form.Label>
                <Form.Select value={categoryId ?? ""}
                    onChange={handleCategoryChange} name="category" >
                    {categories.map((e, i) =>
                        <option key={i} value={e.id}>{e.name}</option>
                    )}
                </Form.Select>
            </Form.Group>
            <TestPanel category={categoryId}></TestPanel>
        </>

    );
}

export default TestsPage;