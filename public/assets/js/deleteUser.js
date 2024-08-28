$(document).ready(function () {


    var id;

    $('.delete-btn').click(function () {
        id = $(this).data('id');
        console.log(id);
    });


    $("#modalDeleteUser").submit(function (event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma convencional

        setTimeout(function () {
            enviarFormulario();
        }, 1200);
    })



    function enviarFormulario() {
        var formDataArray = $("#modalDeleteUser").serializeArray();
        formDataArray.push({ name: "cedula", value: id });
        var formData = $.param(formDataArray)

        //Enviar datos al servidor
        $.ajax({
            url: 'usuario/destroy',
            type: 'POST',
            data: formData + '&method=post',
            dataType: 'json'
        }).done(function (response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Se Eliminaron los registros correctamente',
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





