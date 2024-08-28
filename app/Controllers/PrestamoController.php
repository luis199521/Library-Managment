<?php

namespace App\Controllers;

use Database\PDO\Connection;

class PrestamoController
{

  private $connection;

  public function __construct()
  {
    $this->connection = Connection::getInstance()->get_database_instance();
  }

  public function index()
  {
    $stmt = $this->connection->prepare("SELECT * FROM prestamo");
    $stmt->execute();
    $prestamos = $stmt->fetchAll();
    // Renderiza la vista y pasa los datos
    require "../resources/views/prestamo/prestamo-panel.php";

  }


 

  
  public function countPrestamos()
  {
    $stmt = $this->connection->prepare("SELECT COUNT(*) FROM prestamo");
    $stmt->execute();
    //devuelve un array            
    //$usuarios = $stmt->fetchAll();
    //Devuelve un solo valor
    $prestamos = $stmt->fetchColumn();
   return $prestamos;
  }


}
