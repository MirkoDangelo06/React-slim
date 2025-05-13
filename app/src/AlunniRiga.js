import { useState } from "react";

export default function AlunniRiga (props){
    const a = props.alunno;
    const [cancellato,setCancellato]=  useState(false);
    async function eliminaAlunno(){
        const data = await fetch (`http://8080/scuole/docenti/${a.id}`);
    }
    
    const [conferma, setConferma] = useState(false);
    return(
        <>{!cancellato && 

        <tr>
            <td>{a.id}</td>
            <td>{a.nome}</td>
            <td>{a.cognome}</td>
       <td>
        {conferma ? (
            <div>Sei sicuro 
            
            <button onClick={eliminaAlunno}>si</button>
            <button onClick={() =>setConferma(false)}>no</button>
       </div>
        ):(
            <button onClick={() =>setConferma(true)}>elimina</button>
        )}
        </td> 
        </tr>
    }</>
    );
}