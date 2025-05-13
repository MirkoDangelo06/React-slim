import logo from './logo.svg';
import './App.css';
import{useState} from "react";
import AlunniTable from './AlunniTable';

function App() {

  const[alunni,setAlunni] = useState([]);
  const[caricamento,setCaricamento] =useState(false);



  function caricaAlunni(){
    setCaricamento(true);
    fetch("http://localhost:8080/scuole/1/docenti",{method:"GET"})
    .then((data)=>{
      data.json().then((mieiDati)=>{
        setCaricamento(false);
        setAlunni(mieiDati);
      });
      
    });

  }

  // puoi fare lo stesso facendo la funzione async e mettendo ad ogni operazioni si mette davanti await

  return (
    <div className="App">
    
    {alunni.length > 0 ? (

      <AlunniTable myArray={alunni} />
      ) : (
      <div>
        {caricamento ? (
          <div>  caricamento in corso  </div> 
        ):(
  
        <button onClick={caricaAlunni}>carica alunni</button>
      )
    }
      </div>
    )}
    </div>
  );
}

export default App;
