<?php

namespace App\Controllers;


class DashboardController
{

  public function index()
  {
      $usuario = new UsuarioController();
      $ejemplar = new EjemplarController();
      $libro = new LibroController();
      $prestamo = new PrestamoController();
  
      // Obtén los datos de cada controlador
      $usuarios = $usuario->countUsers();
      $ejemplares = $ejemplar->countEjemplares();
      $libros = $libro->countLibros();
      $prestamos = $prestamo->countPrestamos();    
  
      // Renderiza la vista y pasa los datos
      require "../resources/views/dashboard/dashboard.php";
      
  }

 


}
