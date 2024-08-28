<?php

namespace App\Controllers;

use Database\PDO\Connection;

class UsuarioController
{

  private $connection;

  public function __construct()
  {
    $this->connection = Connection::getInstance()->get_database_instance();
  }


  public function index()
  {
    $stmt = $this->connection->prepare("SELECT * FROM usuario");
    $stmt->execute();
    $usuarios = $stmt->fetchAll();
    // Renderiza la vista y pasa los datos
    require "../resources/views/usuarios/usuario-panel.php";



  }



  public function store($data)
    {

        $cedula = $data['cedula'] ?? '';
        $name = $data['nombre'] ?? '';
        $apellido = $data['apellido'] ?? '';
        $direccion = $data['direccion'] ?? '';
        $telefono = $data['telefono'] ?? '';
      
        $errores = [];

        // Validar el campo cedula
        if (empty($cedula)) {
            $errores[] = 'El usuario es obligatorio.';
        }
        
        // Validar el campo nombre

        if (empty($name)) {
          $errores[] = 'El nombre es obligatorio.';
      }

          // Validar el campo apellido

          if (empty($apellido)) {
            $errores[] = 'El apellido es obligatorio.';
        }


        // Validar el campo direccion
        if (empty($direccion)) {
            $errores[] = "La direccion es obligatorio.";
        }

        // Validar el campo direccion
        if (empty($telefono)) {
          $errores[] = "El telefono es obligatorio.";
      }

        if (!empty($errores)) {
            $response = array(
                "success" => false
            );
            echo json_encode($response);
            return;
        } else {    
           
            $stmt = $this->connection->prepare("INSERT INTO usuario (cedula, nombre, apellido, direccion, 
            telefono) VALUES(:cedula, :nombre, :apellido, :direccion, 
            :telefono);");

          $stmt->bindValue(":cedula", $data["cedula"]);
          $stmt->bindValue(":nombre", $data["nombre"]);
          $stmt->bindValue(":apellido", $data["apellido"]);
          $stmt->bindValue(":direccion", $data["direccion"]);
          $stmt->bindValue(":telefono", $data["telefono"]);
      
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

  
  public function countUsers()
  {
    $stmt = $this->connection->prepare("SELECT COUNT(*) FROM usuario");
    $stmt->execute();
    //devuelve un array            
    //$usuarios = $stmt->fetchAll();
    //Devuelve un solo valor
    $usuarios = $stmt->fetchColumn();
   return $usuarios;
  }


}
