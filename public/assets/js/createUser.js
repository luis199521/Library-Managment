$(document).ready(function () {

    function validarFormularioUser() {
        // Obtener los valores de los campos del formulario
        var cedula = $('#cedula').val(); 
        var name = $('#nombreusuario').val();  
        var apellido = $('#apellido').val();
        var direccion = $('#direccion').val();
        var telefono = $('#telefono').val();

        if (cedula == '') {
            Swal.fire({
                title: 'Error!',
                text: 'La cedula es obligatoria.',
                confirmButtonColor: '#d33',
            });

            return
        }
     
        if (name == '') {
            Swal.fire({
                title: 'Error!',
                text: 'El nombre es obligatorio.',
                confirmButtonColor: '#d33',
            });

            return
        }


       
        if (apellido == '') {
            Swal.fire({
                title: 'Error!',
                text: 'El apellido es obligatorio.',
                confirmButtonColor: '#d33',
            });
            return;
        }

         
         if (direccion == '') {
            Swal.fire({
                title: 'Error!',
                text: 'la direccion es obligatoria.',
                confirmButtonColor: '#d33',
            });
            return;
        }

        if (telefono == '') {
            Swal.fire({
                title: 'Error!',
                text: 'El telefono es obligatorio.',
                confirmButtonColor: '#d33',
            });
            return;
        }

    }



    $("#modalCreateUser").submit(function (event) {
       
        validarFormularioUser();
        event.preventDefault(); // Evita que el formulario se envíe de forma convencional
        setTimeout(function () {
            enviarFormulario();
        }, 1200);
    })


    function enviarFormulario() {
        var formData = $("#modalCreateUser").serialize();

        //Enviar datos al servidor
        $.ajax({
            url: 'usuario/store',
            type: 'POST',
            data: formData + '&method=post',
            dataType: 'json'
        }).done(function (response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Se Guardaron los registros correctamente',
                    confirmButtonText: 'OK'
                });
                // Esperar 1 segundo y redirigir a otra página
                setTimeout(function () {
                    window.location.href = "usuario";
                }, 1000);

            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error',
                confirmButtonText: 'OK'
            });
        });

    }






});





