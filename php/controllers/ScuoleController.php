<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ScuoleController
{
  public function index(Request $request, Response $response, $args){
    sleep(3);
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $mysqli_connection->query("SELECT * FROM scuole" );
    $results = $result->fetch_all(MYSQLI_ASSOC);

    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }


  public function show(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $mysqli_connection->query("SELECT * FROM scuole where id = " .$args['scuola_id'] );

    if (empty($result)){ 
        $response->getBody()->write(json_encode("nessuna scuola trovata"));
        return $response->withHeader("Content-type", "application/json")->withStatus(404);
    }else{
        $results = $result->fetch_all(MYSQLI_ASSOC);
        $response->getBody()->write(json_encode($results));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }
  }



  public function create(Request $request, Response $response, $args){
    $body = json_decode($request->getBody()->getContents(), true);
    //lo prende dal curl
    $nome = $body["nome"];
    $indirizzo = $body["indirizzo"]; 
    
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $creation = $mysqli_connection->query("INSERT INTO `scuole`(`nome`, `indirizzo`) VALUES ('$nome','$indirizzo')");

    return $response->withHeader("Content-type", "application/json")->withStatus(201);
  }



  public function update(Request $request, Response $response, $args){
    $body = json_decode($request->getBody()->getContents(), true);
    $nome = $body["nome"];
    $indirizzo = $body["indirizzo"]; 

    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $creation = $mysqli_connection->query("UPDATE `scuole` SET `nome`='$nome',`indirizzo`='$indirizzo' WHERE id = $args[scuola_id]");

    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }



  public function delete(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $mysqli_connection->query("DELETE FROM `scuole` WHERE id = $args[scuola_id]");

    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }



  



public function deshendingOrder(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    
        $result = $mysqli_connection->query("SELECT * FROM scuole ORDER BY scuole.nome DESC");
        $results = $result->fetch_all(MYSQLI_ASSOC);
  
    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }
  
  
  
  
  
  public function ashendingOrder(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
   
        $result = $mysqli_connection->query("SELECT * FROM scuole ORDER BY scuole.nome ASC");
        $results = $result->fetch_all(MYSQLI_ASSOC);
      
    
  
    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }



}
