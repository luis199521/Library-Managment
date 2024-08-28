<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Bibliotecario | Inicio de sesion</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dashboard/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Sistema</b>Bibliotecario</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Inicia sesion para continuar</p>

                <form action="" method="post" id="formularioInicioSesion">
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Correo electronico">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                  



                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Recuerdame
                                </label>
                            </div>
                        </div>

                        <input type="hidden" name="method" value="post">

                        <!-- /.col -->

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p class="mt-1">No tienes una cuenta? <a href="/signup  " class="link-danger">Registrate</a></p>

                        </div>

                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">Olvide mi contraseña</a>
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="/assets/dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dashboard/dist/js/adminlte.min.js"></script>
    <!--Validate Form-->
<!--<script src="/assets/js/validateLogin.js"></script>-->
<script src="/assets/js/validateLogin.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</body>

</html>