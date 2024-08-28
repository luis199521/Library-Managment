


$(document).ready(function () {
    
    function validarFormularioLogin() {
        // Obtener los valores de los campos del formulario
        var email = $('#email').val();
        var password = $('#password').val();
        // Validar el campo username
        if (email == '') {
            Swal.fire({
                title: 'Error!',
                text: 'El usuario es obligatorio.',
                confirmButtonColor: '#d33',
            });

            return
        }


        // Validar el campo email
        if (password == '') {
            Swal.fire({
                title: 'Error!',
                text: 'La contraseña es obligatorio.',
                confirmButtonColor: '#d33',
            });
            return;
        }

    }



    $("#formularioInicioSesion").submit(function (event) {
        validarFormularioLogin();
        event.preventDefault(); // Evita que el formulario se envíe de forma convencional
        setTimeout(function () {
            enviarFormulario();
        }, 1200);
    })


    function enviarFormulario() {
        var formData = $("#formularioInicioSesion").serialize();

        //Enviar datos al servidor
        $.ajax({
            url: 'auth/login',
            type: 'POST',
            data: formData + '&method=post',
            dataType: 'json'
        }).done(function (response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Se ha iniciado sesion con exito.',
                    confirmButtonText: 'OK'
                });
                // Esperar 1 segundo y redirigir a otra página
                setTimeout(function () {
                    window.location.href = "dashboard";
                }, 1000);



            } else if (response.errorType === 'datosIncorrectos') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo iniciar sesion  ',
                    confirmButtonText: 'OK'
                });
            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error, datos incorrectos.',
                confirmButtonText: 'OK'
            });
        });

    }






});





