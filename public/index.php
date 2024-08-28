<?php
require '../vendor/autoload.php';

use App\Controllers\EjemplarController;
use App\Controllers\UsuarioController;
use App\Controllers\DashboardController;
use App\Controllers\LibroController;
use App\Controllers\PrestamoController;
use App\helpers\Auth;
use App\helpers\Validate;
use Router\RouterHandler;

//Obtener la URL

//Si esta variable no esta definida, estara vacia
//El valor sera cualquier cosa que se escriba en la url
$slug = $_GET["slug"] ?? "";
//Dividir la url a traves de la diagonal cualquiercosa/cualquiercosa
$slug = explode("/", $slug);

//Si no estan accediendo a nada que estan accediendo a la raiz del archivo /
// y si no esta vacia que el resorce valga lo que hay en la primera parte del slug
$resource = $slug[0] == "" ? "/" : $slug[0];
//si slug[1] existe, asiganlo a $id si no ponle null
$id = $slug[1] ?? null;
// $resource/$id

//Instancia del router
$router = new RouterHandler();
switch ($resource){
    case '/':
     require  "../resources/views/autenticacion/login.php";
    break;

    case 'auth':
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        //var_dump($_POST);
        $router->set_data($_POST);
        $router->route(Auth::class,$id);
   

    break;

    case 'logout':
       $cerrar = new Auth();
       $cerrar->logout();
   
    break;

    case 'signup':
       
    require "../resources/views/autenticacion/signup.php";
    break;

  
    

    case 'validate':
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(Validate::class,$id);

    break;

    case 'dashboard':
      
        //require "../resources/views/dashboard/dashboard.php";
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(DashboardController::class,$id);
        
    break;



    case 'usuario':
        
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(UsuarioController::class,$id);
   

    break;

    case 'libro':
    
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(LibroController::class,$id);
   

    break;


    case 'ejemplar':
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(EjemplarController::class,$id);
   

    break;

    case 'prestamo':
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(PrestamoController::class,$id);
   

    break;


    

    /*case 'withdrawals':
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(WithdrawalController::class,$id);
   
    break;*/

    default:
    echo "404 Not Found";
    break;

}