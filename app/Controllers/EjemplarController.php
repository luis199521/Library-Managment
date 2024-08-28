<?php

namespace App\Controllers;

use Database\PDO\Connection;

class EjemplarController
{

  private $connection;

  public function __construct()
  {
    $this->connection = Connection::getInstance()->get_database_instance();
  }


  public function index()
  {
    $stmt = $this->connection->prepare("SELECT * FROM ejemplar");
    $stmt->execute();
    $ejemplares = $stmt->fetchAll();
    // Renderiza la vista y pasa los datos
    require "../resources/views/ejemplar/ejemplar-panel.php";



  }


  
  

   
  public function countEjemplares()
  {
    $stmt = $this->connection->prepare("SELECT COUNT(*) FROM ejemplar");
    $stmt->execute();
    //devuelve un array            
    //$usuarios = $stmt->fetchAll();
    //Devuelve un solo valor
    $ejemplares = $stmt->fetchColumn();
   return $ejemplares;
  }

 


}
