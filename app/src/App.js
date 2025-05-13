import logo from './logo.svg';
import './App.css';
import{useState} from "react";

function App() {

  const[alunni,setAlunni] = useState([]);

  function caricaAlunni(){
    const a = [{"id":"1","nome":"Claudio","cognome":"Benvenuti","scuola_id":"1"},{"id":"2","nome":"Ivan","cognome":"Bruno","scuola_id":"1"}];
    setAlunni(a);
  }


  return (
    <div className="App">
    
    {alunni.length > 0 ? (

      <table border="1">
      {alunni.map(a =>
        <tr>   
          <td>{a.id}</td>
          <td>{a.nome}</td>
          <td>{a.cognome}</td>
        </tr>
      )}
    </table>
      ):(
        <button onClick={caricaAlunni}> carica alunni</button>
      )
    }
    </div>
  );
}

export default App;
