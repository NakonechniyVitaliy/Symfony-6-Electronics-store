export default function Header(){
    return (
        <header className="header">
            <div className="header-items">
                <a className="flex-logo background-logo-div" ></a>
                <div className="flex-tab"></div>
                <div className="flex-tab"><a >MAIN</a></div>
                <div className="flex-tab"><a>MANUFACTURER</a></div>
                <div className="flex-tab"><a>COUNTRY</a></div>
                <div className="flex-tab"><a>CATEGORY</a></div>
                <div className="flex-tab"><a>LOGIN</a></div>
            </div>
        </header>
    )
}