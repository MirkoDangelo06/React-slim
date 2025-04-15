<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DocentiController
{
  public function index(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $mysqli_connection->query("SELECT * FROM docenti where scuola_id = " .$args['scuola_id'] );
    $results = $result->fetch_all(MYSQLI_ASSOC);

    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }


  public function show(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $mysqli_connection->query("SELECT * FROM docenti WHERE id = $args[docente_id]");
    $results = $result->fetch_all(MYSQLI_ASSOC);

    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }

  

  public function create(Request $request, Response $response, $args) {

    $body = json_decode($request->getBody()->getContents(), true);
   
    $nome = $body["nome"];
    $cognome= $body["cognome"];
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $creation = $mysqli_connection->query("INSERT INTO docenti (nome, cognome, scuola_id) VALUES ( '$nome','$cognome',  " . $args["scuola_id"] . " )");


    return $response->withHeader("Content-type", "application/json")->withStatus(201);
}



public function update(Request $request, Response $response, $args) {
  $body = json_decode($request->getBody()->getContents(), true);
  $nome = $body["nome"];
  $cognome= $body["cognome"];

  $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
  $update = $mysqli_connection->query("UPDATE docenti SET  nome='$nome', cognome='$cognome'  WHERE id = $args[docente_id]");

  return $response->withHeader("Content-type", "application/json")->withStatus(200);
}


public function delete(Request $request, Response $response, $args){
  $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
  $result = $mysqli_connection->query("DELETE FROM `docenti` WHERE id = $args[docente_id]");

  return $response->withHeader("Content-type", "application/json")->withStatus(200);
}




public function deshendingOrder(Request $request, Response $response, $args){
  $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
  switch($args['cs']){
    case 'N':
    case 'n':
      $result = $mysqli_connection->query("SELECT * FROM docenti ORDER BY docenti.nome DESC");
      $results = $result->fetch_all(MYSQLI_ASSOC);
      break;
    case 'C':
    case 'c':
      $result = $mysqli_connection->query("SELECT * FROM docenti ORDER BY docenti.cognome DESC");
      $results = $result->fetch_all(MYSQLI_ASSOC);
  }

  $response->getBody()->write(json_encode($results));
  return $response->withHeader("Content-type", "application/json")->withStatus(200);
}





public function ashendingOrder(Request $request, Response $response, $args){
  $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
  switch($args['cs']){
    case 'N':
    case 'n':
      $result = $mysqli_connection->query("SELECT * FROM docenti ORDER BY docenti.nome ASC");
      $results = $result->fetch_all(MYSQLI_ASSOC);
      break;
    case 'C':
    case 'c':
      $result = $mysqli_connection->query("SELECT * FROM docenti ORDER BY docenti.cognome ASC");
      $results = $result->fetch_all(MYSQLI_ASSOC);
  }

  $response->getBody()->write(json_encode($results));
  return $response->withHeader("Content-type", "application/json")->withStatus(200);
}


// ho organizzato malino il tempo , volevo fare alla fine tutti i controlli ma  non ce l'ho fatta ...

}
