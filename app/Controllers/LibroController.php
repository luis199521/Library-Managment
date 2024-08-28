<?php

namespace App\Controllers;

use Database\PDO\Connection;

class LibroController
{

  private $connection;

  public function __construct()
  {
    $this->connection = Connection::getInstance()->get_database_instance();
  }

  public function index()
  {
    $stmt = $this->connection->prepare("SELECT * FROM libro");
    $stmt->execute();
    $libros = $stmt->fetchAll();
    // Renderiza la vista y pasa los datos
    require "../resources/views/libro/libro-panel.php";



  }

  public function store($data)
    {

        $codigolibro = $data['codigolibro'] ?? '';
        $titulo = $data['titulo'] ?? '';
        $isbn = $data['isbn'] ?? '';
        $editorial = $data['editorial'] ?? '';
        $numeropaginas = $data['numeropaginas'] ?? '';
        $autor = $data['autor'] ?? '';
      
        $errores = [];

        // Validar el campo cedula
        if (empty($codigolibro)) {
            $errores[] = 'El codigo es obligatorio.';
        }
        
        // Validar el campo nombre

        if (empty($titulo)) {
          $errores[] = 'El titulo es obligatorio.';
      }

          // Validar el campo apellido

          if (empty($isbn)) {
            $errores[] = 'El isbn es obligatorio.';
        }


        // Validar el campo direccion
        if (empty($editorial)) {
            $errores[] = "La editorial es obligatorio.";
        }

        // Validar el campo direccion
        if (empty($numeropaginas)) {
          $errores[] = "El numeropaginas es obligatorio.";
      }

    // Validar el campo direccion
        if (empty($autor)) {
          $errores[] = "El autor es obligatorio.";
       }


        if (!empty($errores)) {
            $response = array(
                "success" => false
            );
            echo json_encode($response);
            return;
        } else {    
           
            $stmt = $this->connection->prepare("INSERT INTO libro (codigolibro, titulo, isbn, editorial, 
            numeropaginas,autor) VALUES(:codigolibro, :titulo, :isbn, :editorial, 
            :numeropaginas, :autor);");

          $stmt->bindValue(":codigolibro", $data["codigolibro"]);
          $stmt->bindValue(":titulo", $data["titulo"]);
          $stmt->bindValue(":isbn", $data["isbn"]);
          $stmt->bindValue(":editorial", $data["editorial"]);
          $stmt->bindValue(":numeropaginas", $data["numeropaginas"]);
          $stmt->bindValue(":autor", $data["autor"]);
      
          $stmt->execute();


            $response = array(
                "success" => true
            );


            echo json_encode($response);
        }
        
    }


    public function update($data)
    {
        $cedula = $data['cedula'] ?? '';
        $name = $data['nombre'] ?? '';
        $apellido = $data['apellido'] ?? '';
        $direccion = $data['direccion'] ?? '';
        $telefono = $data['telefono'] ?? '';
    

            // Construir la consulta de actualización
            $sql = "UPDATE usuario SET ";
            $updates = array();
    
            // Verificar y agregar los campos modificados a la consulta
            if (!empty($name)) {
                $updates[] = "nombre = :nombre";
            }
            if (!empty($apellido)) {
                $updates[] = "apellido = :apellido";
            }
            if (!empty($direccion)) {
                $updates[] = "direccion = :direccion";
            }
            if (!empty($telefono)) {
                $updates[] = "telefono = :telefono";
            }
    
            $sql .= implode(', ', $updates);
            $sql .= " WHERE cedula = :cedula;";
    
            // Preparar la consulta de actualización
            $stmt = $this->connection->prepare($sql);
    
            // Parámetros de la consulta
            $params = array(":cedula" => $cedula);
    
            if (!empty($name)) {
                $params[":nombre"] = $name;
            }
            if (!empty($apellido)) {
                $params[":apellido"] = $apellido;
            }
            if (!empty($direccion)) {
                $params[":direccion"] = $direccion;
            }
            if (!empty($telefono)) {
                $params[":telefono"] = $telefono;
            }
    
            // Ejecutar la consulta de actualización en la base de datos
            $stmt->execute($params);
    
            $response = array(
                "success" => true
            );
    
            echo json_encode($response);
        
    }


    public function destroy($id)
    {
  
      $stmt = $this->connection->prepare("DELETE FROM usuario WHERE cedula = :cedula");
      $stmt->execute([
        ":cedula" => $id["cedula"]
      ]);

      $response = array(
        "success" => true
    );

    echo json_encode($response);
      
    }
 

  
  public function countLibros()
  {
    $stmt = $this->connection->prepare("SELECT COUNT(*) FROM libro");
    $stmt->execute();
    //devuelve un array            
    //$usuarios = $stmt->fetchAll();
    //Devuelve un solo valor
    $libros = $stmt->fetchColumn();
   return $libros;
  }


}
