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
  <title>Sistema Bibliotecario| Ejemplar</title>

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
              <h1>Pagina de Ejemplares</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Ir al Dashboard</a></li>
                <li class="breadcrumb-item active">Ejemplares</li>
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
                  <h3 class="card-title">Listado de Ejemplares</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Codigo ejemplar</th>
                        <th>Localizacion</th>
                        <th>Codigo Libro</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($ejemplares as $ejemplar) : ?>
                        <tr>
                          <td><?= $ejemplar["codigoeje"] ?></td>
                          <td><?= $ejemplar["localizacion"] ?></td>
                          <td><?= $ejemplar["codigolibro"] ?></td>
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