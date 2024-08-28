<?php 

namespace App\helpers;
use Database\PDO\Connection;

class Auth {

    private $connection;

    public function __construct()
    {
      $this->connection = Connection::getInstance()->get_database_instance();
    }
    
   

    public function login($email, $password) {
        //var_dump($password);
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([
            ":email" => $email

        ]);

        $user = $stmt->fetch();
        
          if ($user !== false && password_verify($password, $user["password"])) {
            // La contraseña es correcta, así que iniciamos sesión
            session_start();
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['nombre_usuario'] = $user['username'];
            $_SESSION['correo'] = $user['email'];
            
            $response = array(
                "success" => true,
            );

            echo json_encode($response);
            
        } else {
            // El usuario o la contraseña son incorrectos
            $response = array(
                "success" => false,
                "errorType" => "datosIncorrectos"
            );

            echo json_encode($response);
           
        }
    }

    public function logout() {
        session_start(); 
        session_destroy(); // Destruir la sesión
        header("Location: /");

        
    }

    public function isLoggedIn() {
        session_start();
        return isset($_SESSION['user']);
    }

    public function getUser() {
        session_start();

        if (isset($_SESSION['user'])) {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->execute([$_SESSION['user']]);
            return $stmt->fetch();
        } else {
            return false;
        }
    }
}
