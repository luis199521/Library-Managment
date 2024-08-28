<?php
session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['usuario_id'])) {
  header("Location: /");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Bibliotecario| Usuarios</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dashboard/dist/css/adminlte.min.css">
</head>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Sistema Bibliotecario</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/assets/dashboard/dist/img/icons8-user-50.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['nombre_usuario'] ?></a>
          </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="dashboard" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="usuario" class="nav-link active">
                <i class="nav-icon  fas fa-users"></i>
                <p>
                  Usuarios

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="libro" class="nav-link">
                <i class="nav-icon  fas fa-book"></i>
                <p>
                  Libros

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="prestamo" class="nav-link">
                <i class="nav-icon  fas fa-clipboard"></i>
                <p>
                  Prestamos

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ejemplar" class="nav-link">
                <i class="nav-icon  fas fa-swatchbook"></i>
                <p>
                  Ejemplar

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Cerrar sesión
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Pagina de usuarios</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard">Ir al Dashboard</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de usuarios de la Bilbioteca</h3>
                </div>
                <div class="card-header">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear un nuevo usuario</button>
                </div>
                <!-- Modal Create user -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Creando un nuevo usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post" id="modalCreateUser">
                          <div class="row ">
                            <div class="col">
                              <strong>
                                <p>Cedula:</p>
                              </strong>
                            </div>
                          </div>
                          <div class="row ">
                            <div class="col">
                              <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Ingresa su cedula">
                            </div>
                          </div>
                          <div class="row ">
                            <div class="col">
                              <strong>
                                <p>Nombre:</p>
                              </strong>
                            </div>
                          </div>
                          <div class="row ">
                            <div class="col">
                              <input type="text" name="nombre" id="nombreusuario" class="form-control" placeholder="Ingresa un nombre">
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col">
                              <strong>
                                <p>Apellido:</p>
                              </strong>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingresa un apellido">
                            </div>
                          </div>
                          <div class="row mt-2 ">
                            <div class="col">
                              <strong>
                                <p>Direccion:</p>
                              </strong>
                            </div>
                          </div>
                          <div class="row ">
                            <div class="col">
                              <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingresa una dirección">
                            </div>
                          </div>
                          <div class="row mt-2 ">
                            <div class="col">
                              <strong>
                                <p>Telefono:</p>
                              </strong>
                            </div>
                          </div>
                          <div class="row ">
                            <div class="col">
                              <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingresa un teléfono">
                            </div>
                          </div>
                          <input type="hidden" name="method" value="post">
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /.Modal Create user -->

                <!-- Modal Update user -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabe2">Editando Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post" id="modalUpdateUser">
                          <div class="row ">
                            <div class="col">
                              <strong>
                                <p>Nombre:</p>
                              </strong>
                            </div>
                          </div>
                          <div class="row ">
                            <div class="col">
                              <input type="text" name="nombre" id="nombreusuario" class="form-control" placeholder="Ingresa un nombre">
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col">
                              <strong>
                                <p>Apellido:</p>
                              </strong>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingresa un apellido">
                            </div>
                          </div>
                          <div class="row mt-2 ">
                            <div class="col">
                              <strong>
                                <p>Direccion:</p>
                              </strong>
                            </div>
                          </div>
                          <div class="row ">
                            <div class="col">
                              <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingresa una dirección">
                            </div>
                          </div>
                          <div class="row mt-2 ">
                            <div class="col">
                              <strong>
                                <p>Telefono:</p>
                              </strong>
                            </div>
                          </div>
                          <div class="row ">
                            <div class="col">
                              <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingresa un teléfono">
                            </div>
                          </div>
                          <input type="hidden" name="method" value="post">
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/. Modal Update user -->

                <!-- Modal Delete user -->
                <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabe3">Eliminando Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post" id="modalDeleteUser">
                          <div class="row ">
                            <div class="col">
                                <p>¿Estas seguro de que quieres eliminar este usuario?</p>
                            </div>
                          </div>
                          <input type="hidden" name="method" value="post">
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/. Modal Delete user -->

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                          <td><?= $usuario["cedula"] ?></td>
                          <td><?= $usuario["nombre"] ?></td>
                          <td><?= $usuario["apellido"] ?></td>
                          <td><?= $usuario["direccion"] ?></td>
                          <td><?= $usuario["telefono"] ?></td>
                          <td>
                            <button class="btn btn-primary edit-btn" data-toggle="modal" data-target="#exampleModal2" data-id=<?= $usuario["cedula"] ?>><span class="fas fa-edit"></span></button>
                            <button class="btn btn-danger delete-btn" data-toggle="modal" data-target="#exampleModal3" data-id=<?= $usuario["cedula"] ?>><span class="fas fa-trash"></span></button>
                          </td>

                          </td>
                        </tr>
                      <?php endforeach; ?>
                   

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="assets/dashboard/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="assets/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="assets/dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="assets/dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/dashboard/plugins/jszip/jszip.min.js"></script>
  <script src="assets/dashboard/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="assets/dashboard/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="assets/dashboard/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="assets/dashboard/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="assets/dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



  <!-- AdminLTE App -->
  <script src="assets/dashboard/dist/js/adminlte.min.js"></script>
  <!--Validate Modal create user-->
  <script src="/assets/js/createUser.js"></script>
  <script src="/assets/js/updateUser.js"></script>
  <script src="/assets/js/deleteUser.js"></script>

  <!--SweetAlert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "paging": true,
        "responsive": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>

</html>