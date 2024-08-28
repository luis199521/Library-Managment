$(document).ready(function () {

    function validarFormulario() {
        // Obtener los valores de los campos del formulario
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var repassword = $('#repassword').val();
        // Validar el campo username
        if (username == '') {
            Swal.fire({
                title: 'Error!',
                text: 'El usuario es obligatorio.',
                confirmButtonColor: '#d33',
            });

            return 
        }

        var regexUsername = /^[a-zA-Z0-9]+$/;
        if (!regexUsername.test(username)) {
            Swal.fire({
                title: 'Error!',
                text: 'El  usuario no debe contener caracteres especiales ni espacios en blanco.',
                confirmButtonColor: '#d33',
            });

            return;
        }

        // Validar el campo email
        if (email == '') {
            Swal.fire({
                title: 'Error!',
                text: 'El correo electronico es obligatorio.',
                confirmButtonColor: '#d33',
            });
            return;
        }

        var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regexEmail.test(email)) {
            Swal.fire({
                title: 'Error!',
                text: 'El correo electronico debe tener un formato válido.',
                confirmButtonColor: '#d33',
            });
            return;
        }

        // Validar el campo password
        if (password == '') {
            Swal.fire({
                title: 'Error!',
                text: 'La contraseña es obligatorio.',
                confirmButtonColor: '#d33',
            });

            return;
        }

        if (password.length < 8) {
            Swal.fire({
                title: 'Error!',
                text: 'La contraseña debe tener al menos 8 caracteres',
                confirmButtonColor: '#d33',
            });
            return;
        }

        var regexPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (!regexPassword.test(password)) {
            Swal.fire({
                title: 'Error!',
                text: 'La contraseña debe contener al menos una letra y un número',
                confirmButtonColor: '#d33',
            });
            return;
        }

        //Validar si coinciden las contraseñas

        if (password !== repassword) {
            Swal.fire({
                title: 'Error!',
                text: 'Las contraseñas deben coincidir',
                confirmButtonColor: '#d33',
            });

            return;
        }



    }


   
        $("#formularioRegistro").submit(function (event) {

            validarFormulario();
            event.preventDefault(); // Evita que el formulario se envíe de forma convencional
            setTimeout(function() {
                enviarFormulario();
            }, 1200);
        });

    function enviarFormulario() {
        var formData = $("#formularioRegistro").serialize();

        //Enviar datos al servidor
        $.ajax({
            url: 'validate/store',
            type: 'POST',
            data: formData,
            dataType: 'json'
          }).done(function(response) {
            if (response.success) {
              Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Registros guardados con éxito.',
                confirmButtonText: 'OK'
              });
            } else {
              if (response.errorType === 'usuarioExistente') {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'El usuario o el correo electrónico están en uso.',
                  confirmButtonText: 'OK'
                });
              } else if (response.errorType === 'otroError') {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Ha ocurrido un error en la operación.',
                  confirmButtonText: 'OK'
                });
              }
            }
          }).fail(function(xhr, status, error) {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Ha ocurrido un error al guardar los registros.',
              confirmButtonText: 'OK'
            });
          });
          
    }






});



  

  