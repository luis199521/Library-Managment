$(document).ready(function () {

    var id;

    $('.edit-btn').click(function () {
        id = $(this).data('id');
    });


    $("#modalUpdateUser").submit(function (event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma convencional

        setTimeout(function () {
            enviarFormulario();
        }, 1200);
    })



    function enviarFormulario() {
        var formDataArray = $("#modalUpdateUser").serializeArray();
        formDataArray.push({ name: "cedula", value: id });
        var formData = $.param(formDataArray)

        //Enviar datos al servidor
        $.ajax({
            url: 'usuario/update',
            type: 'POST',
            data: formData + '&method=post',
            dataType: 'json'
        }).done(function (response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Se Actualizaron los registros correctamente',
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





