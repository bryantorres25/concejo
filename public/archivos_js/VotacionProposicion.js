$(function() {

    $('form').parsley();
    $('#opciones').show();
    $("#aprobar").click(function() {
        let op = 1;

        $('#respuesta').val(op);

    });

    $("#rechazar").click(function() {
        let op = 0;

        $('#respuesta').val(op);

    });


    $("#form_votacion").submit(function(event) {
        event.preventDefault();
        if ($('#respuesta').val() == '') {
            alert('No ha seleccionado una respuesta')
        } else {
            swal({
                title: 'Sistema de Votación',
                text: "¿Está seguro de enviar la información?",
                type: 'warning',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#589B4E',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#B43437',
                showCancelButton: true,

            }).then((Delete) => {
                if (Delete) {
                    save();
                } else {
                    swal.close();
                }
            });
        }


    });

});

//guardar en el form
const save = () => {
    let form = $('#form_votacion');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                swal({
                    title: 'Sistema de Votación',
                    text: data.success,
                    type: 'success',
                    allowOutsideClick: false,
                    confirmButtonColor: '#589B4E',
                }).then((Delete) => {
                    if (Delete) {
                        $('#opciones').hide();
                        window.location.href = '../resultadospro';
                    } else {
                        window.location.href = '../resultadospro';
                    }
                });


            } else {
                warning(data.warning);
            }

        },
        error: function(data) {

            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });

}