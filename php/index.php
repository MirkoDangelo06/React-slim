<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/DocentiController.php';
require __DIR__ . '/controllers/ScuoleController.php';

$app = AppFactory::create();
$app->addErrorMiddleWare(true,true,true);

//endpoint docenti
    // 1 recuperare tutti i docenti di una scuola 
    $app->get('/scuole/{scuola_id:\d+}/docenti', "DocentiController:index");

    // 2 recuperare un singolo docente tramite id 
    $app->get('/scuole/docenti/{docente_id:\d+}', "DocentiController:show");


    // 3 Creare un nuovo docente per una scuola.
    $app->post('/scuole/{scuola_id}/docenti', "DocentiController:create");


    // 4 Aggiornare le informazioni di un docente.
    $app->put('/scuole/docenti/{docente_id}', "DocentiController:update");

    // 5 Eliminare un docente.
    $app->delete('/scuole/docenti/{docente_id}', "DocentiController:delete");

    // ordinato
    $app->get('/scuole/docenti/order/deshending/{cs:[NnCc]}', "DocentiController:deshendingOrder");

    $app->get('/scuole/docenti/order/ascending/{cs:[NnCc]}', "DocentiController:ashendingOrder");


//endpoint scuole 

    // 1  tutte le scuole
    $app->get('/scuole', "ScuoleController:index");

    // 2  una scuola tramite id 
     $app->get('/scuole/{scuola_id:\d+}', "ScuoleController:show");

    // 3  Creare una nuova scuola.
    $app->post('/scuole', "ScuoleController:create");

    // 4  update scuola
    $app->put('/scuole/{scuola_id:\d+}', "ScuoleController:update");
    

     // 5  delete scuola
     $app->delete('/scuole/{scuola_id:\d+}', "ScuoleController:delete");
     
     // ordinato tutte le scuole 

     $app->get('/scuole/order/deshending', "ScuoleController:deshendingOrder");

     $app->get('/scuole/order/ascending', "ScuoleController:ashendingOrder");




$app->run();



//--PER IL CREATE della  scuola
//curl -X POST http://localhost:8080/scuole -H "Content-Type: application/json" -d '{"nome": "ScandicciSchool", "indirizzo": "Via di scandicci 6"}'


//--PER L'UPDATE scuola
//curl -X PUT http://localhost:8080/scuole/1 -H "Content-Type: application/json" -d '{"nome": "sassetti", "indirizzo": "cia del cavallaccio"}'


// Per il delete della scuola 
//curl -X DELETE http://localhost:8080/scuole/1




/*per create docente
curl -X POST http://localhost:8080/scuole/1/docenti -H "Content-Type: appplication/json" -d '{"nome": "Marsala", "cognome":  "Antonietta"}'
*/


//-- Per update docente
/*curl -X PUT http://localhost:8080/scuole/docenti/1 -H "Content-Type: application/json" -d '{"nome": "Mario", "cognome": "rossi"}'
*/

//delete docente
// curl -X DELETE http://localhost:8080/docenti/1











