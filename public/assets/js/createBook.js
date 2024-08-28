$(document).ready(function () {

    function validarFormularioLibro() {
        // Obtener los valores de los campos del formulario
        var codigolibro = $('#codigolibro').val(); 
        var titulo = $('#titulo').val();  
        var isbn = $('#isbn').val();
        var editorial = $('#editorial').val();
        var numeropaginas = $('#numeropaginas').val();
        var autor = $('#autor').val();

        if (codigolibro == '') {
            Swal.fire({
                title: 'Error!',
                text: 'El codigo  es obligatoria.',
                confirmButtonColor: '#d33',
            });

            return
        }
     
        if (titulo == '') {
            Swal.fire({
                title: 'Error!',
                text: 'El titulo es obligatorio.',
                confirmButtonColor: '#d33',
            });

            return
        }


       
        if (isbn == '') {
            Swal.fire({
                title: 'Error!',
                text: 'La isbn es obligatorio.',
                confirmButtonColor: '#d33',
            });
            return;
        }

         
         if (editorial == '') {
            Swal.fire({
                title: 'Error!',
                text: 'la editorial es obligatoria.',
                confirmButtonColor: '#d33',
            });
            return;
        }

        if (numeropaginas == '') {
            Swal.fire({
                title: 'Error!',
                text: 'El numero de paginas es obligatorio.',
                confirmButtonColor: '#d33',
            });
            return;
        }

        if (autor == '') {
            Swal.fire({
                title: 'Error!',
                text: 'El autor es obligatorio.',
                confirmButtonColor: '#d33',
            });
            return;
        }

    }



    $("#modalCreateBook").submit(function (event) {
       
        validarFormularioLibro();
        event.preventDefault(); // Evita que el formulario se envíe de forma convencional
        setTimeout(function () {
            enviarFormulario();
        }, 1200);
    })


    function enviarFormulario() {
        var formData = $("#modalCreateBook").serialize();

        //Enviar datos al servidor
        $.ajax({
            url: 'libro/store',
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
                    window.location.href = "libro";
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





