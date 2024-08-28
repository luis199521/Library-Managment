<?php

namespace App\helpers;

use Database\PDO\Connection;

class Validate
{

    private $connection;

    public function __construct()
    {
        $this->connection = Connection::getInstance()->get_database_instance();
    }


    public function checkUserCreated($user)
    {

        //var_dump($user);
        $stmt = $this->connection->prepare("SELECT username FROM users WHERE username = :username  OR email = :email");
        $stmt->bindValue(":username", $user["username"]);
        $stmt->bindValue(":email", $user["email"]);

        $results = $stmt->execute();

        $results = $stmt->fetchAll();


        //False si esta creado, True si no esta creado
        $userExists = empty($results);


        return $userExists;
    }


    public function store($data)
    {

        $username = $data['username'] ?? '';
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        $repassword = $data['repassword'] ?? '';
        $errores = [];

        // Validar el campo username
        if (empty($username)) {
            $errores[] = 'El usuario es obligatorio.';
        }


        if (!ctype_alnum($username)) {
            $errores[] = "El usuario no debe contener caracteres especiales ni espacios en blanco.";
        }


        // Validar el campo email
        if (empty($email)) {
            $errores[] = "El correo electronico es obligatorio.";
        }



        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El correo electronico debe tener un formato válido.";
        }



        // Validar el campo password
        if (empty($password) || strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/\d/', $password)) {
            // Mostrar mensaje de error si la contraseña no cumple con los requisitos
            $errores[] = "La contraseña debe tener al menos 8 caracteres, una letra y un número";
        }

        //Validar si coinciden las contraseñas

        if ($password !== $repassword) {
            $errores[] = "Las contraseñas deben coincidir";
        }


        // Hashear la contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Verificar si el usuario ya existe en la base de datos
        $userExists = $this->checkUserCreated($data);


        //False si esta creado, True si no esta creado
        if (!$userExists) {

            $errores[] = "El usuario o el correo electrónico están en uso";
            $response = array(
                "success" => false,
                "errorType" => "usuarioExistente"
            );

            echo json_encode($response);
            return;
        }



        if (!$userExists || !empty($errores)) {
            /*echo '<ul>';
            foreach ($errores as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul>';*/

            $response = array(
                "success" => false
            );
            echo json_encode($response);
            return;
        } else {    
            // Si no hay errores de validación y el usuario no existe, guardar los datos

            $stmt = $this->connection->prepare("INSERT INTO users (username, password, email ) VALUES(:username, :password, :email);");

            $stmt->bindValue(":username", $username);
            $stmt->bindValue(":password", $password_hash);
            $stmt->bindValue(":email", $email);

            $stmt->execute();


            $response = array(
                "success" => true
            );


            echo json_encode($response);
        }


        
    }
}
