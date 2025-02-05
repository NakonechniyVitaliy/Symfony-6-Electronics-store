import './Button.css'


export default function Button(props){
    return(
        <button className={props.buttonClass} onClick={props.buttonOnclick}>{props.buttonText}</button>
    )
}