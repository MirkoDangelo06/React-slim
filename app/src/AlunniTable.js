

import AlunniRiga from "./AlunniRiga"
export default function AlunniTable(props){
    const alunni = props.myArray;
    return(
        <table border="1">
        {alunni.map(a =>
         <AlunniRiga alunno ={a} />
            
        )}
        </table>
    )
}