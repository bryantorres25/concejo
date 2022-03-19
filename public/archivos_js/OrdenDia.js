$(function() {

    $('form').parsley();

    $("#form_create").submit(function(event) {
        event.preventDefault();
        save();
    });

    $("#form_edit").submit(function(event) {
        event.preventDefault();
        update();
    });
    showEdit();
});

//guardar en el form
const save = () => {
    let form = $('#form_create');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {

                success(data.success);
                $('#form_create')[0].reset();
                updateTable();
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

//actualizar-editform
const update = () => {
    let form = $('#form_edit');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                success(data.success);
                $('#modalEdit').modal('hide');
                updateTable();
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


const showEdit = () => {
    $('#modalEdit').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let nombres = button.data('nombres');
        let apellidos = button.data('apellidos');
        let documento = button.data('documento');
        let genero = button.data('genero');
        let telefono = button.data('telefono');
        let direccion = button.data('direccion');
        let cargo_id = button.data('cargo_id');
        let partido_id = button.data('partido_id');
        let modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nombres_e').val(nombres);
        modal.find('.modal-body #apellidos_e').val(apellidos);
        modal.find('.modal-body #documento_e').val(documento);
        modal.find('.modal-body #genero_e').val(genero);
        modal.find('.modal-body #telefono_e').val(telefono);
        modal.find('.modal-body #direccion_e').val(direccion);
        $("#cargo_id option[value='" + cargo_id + "']").attr("selected", true);
        $("#partido_id option[value='" + partido_id + "']").attr("selected", true);

    });
}

//FUNCION DE ESTADOS
const changeEstado = (url) => {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                success(data.success);
                updateTable();
            } else {
                warning(data.warning);
            }

        },
    });
}


const eliminar = (url) => {
    swal({
        title: 'Sistema de Votación',
        text: "¿Está seguro de Eliminar esta proposición?",
        type: 'warning',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#589B4E',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#B43437',
        showCancelButton: true,
    }).then((Delete) => {
        if (Delete) {
            $.ajax({
                url: url,
                type: 'GET',
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
                                window.location.href = 'ordendia';
                            } else {
                                window.location.href = 'ordendia';
                            }
                        });
                    } else {
                        warning(data.warning);
                    }
                },
            });
        } else {
            swal.close();
        }
    });

}