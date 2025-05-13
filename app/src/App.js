import logo from './logo.svg';
import './App.css';

function App() {

  const alunni =[{"id":"1","nome":"Claudio","cognome":"Benvenuti","scuola_id":"1"},{"id":"2","nome":"Ivan","cognome":"Bruno","scuola_id":"1"}];


  return (
    <div className="App">
    
    <table border="1">
    {alunni.map(a =>
      <tr>   
        <td>{a.id}</td>
        <td>{a.nome}</td>
        <td>{a.cognome}</td>
      </tr>
    )}
   </table>

    </div>
  );
}

export default App;
