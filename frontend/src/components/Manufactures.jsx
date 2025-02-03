import { useEffect, useState } from "react";
import axios from "axios";

const API_BASE_URL = import.meta.env.VITE_API_BASE_URL;


export default function Manufactures(){
    const [manufacturers, setManufacturers] = useState([]);

    useEffect(() => {
        axios.get(`${API_BASE_URL}/manufacturer`)
            .then(response => setManufacturers(response.data))
            .catch(error => console.error("Ошибка загрузки:", error))

    }, []);

    return (
        <div>
            <ul>
                {manufacturers.map(manufacturer => (
                    <li key={manufacturer.id}>{manufacturer.title}</li>
                ))}
            </ul>
        </div>
    )
}