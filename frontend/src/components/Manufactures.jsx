import { useEffect, useState } from "react";
import axios from "axios";

const API_BASE_URL = import.meta.env.VITE_API_BASE_URL;

function ManufacturerList(props) {
    return (
        <tr>
            <td>{props.id}</td>
            <td>{props.title}</td>
        </tr>
    )
}

export default function Manufactures() {
    const [manufacturers, setManufacturers] = useState([]);

    useEffect(() => {
        axios.get(`${API_BASE_URL}/manufacturer`)
            .then(response => setManufacturers(response.data))
            .catch(error => console.error("Ошибка загрузки:", error))

    }, []);

    return (
        <table className="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
            </tr>
            </thead>
            <tbody>
                <ManufacturerList {...manufacturers[0]}/>
                <ManufacturerList {...manufacturers[1]}/>
                <ManufacturerList {...manufacturers[2]}/>
            </tbody>
        </table>
    )
}