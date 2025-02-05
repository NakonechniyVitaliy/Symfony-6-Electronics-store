import './Header.css';
import {useState} from "react";
import Button from "../Button/Button.jsx";


export default function Header(){
    const [time, setTime] = useState(new Date());

    function getTime(){
        setTime(new Date());
    }


    return (
        <header className="header">
            <div className="header-logo"></div>
            <div className="space">
                <p>{time.toLocaleTimeString()}</p>
                <Button buttonClass="classic-btn" buttonText="Reload Time" buttonOnclick={getTime} />
            </div>
            <div className="header-items">
                <div className="header-tab">MAIN</div>
                <div className="header-tab">MANUFACTURER</div>
                <div className="header-tab">COUNTRY</div>
                <div className="header-tab">CATEGORY</div>
                <div className="header-tab">LOGIN</div>
            </div>
        </header>
    )
}