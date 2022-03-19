$(function() {

    $('form').parsley();

    $("#form_create").submit(function(event) {

        save();
    });

    $("#form_edit").submit(function(event) {
        update();
    });

    $("#form_autorizacion").submit(function(event) {
        event.preventDefault();
        swal({
            title: 'Sistema de Votación',
            text: "¿Está seguro de autorizar  a Votación?",
            type: 'warning',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#589B4E',
            cancelButtonText: 'Cancelar',
            cancelButtonColor: '#B43437',
            showCancelButton: true,
        }).then((Delete) => {
            if (Delete) {
                saveAutorizacion();
            } else {
                swal.close();
            }
        });



    });
    showEdit();
    showAutorizar();
});

//guardar en el form
const save = () => {
    let form = $('#form_create');
    $.ajax({
        method: "POST",
        url: form.attr('action'),
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
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

const saveAutorizacion = () => {
    let form = $('#form_autorizacion');
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
        method: "POST",
        url: form.attr('action'),
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
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
    $('#modalAutorizacion').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let nombre = button.data('nombre');
        let bancada = button.data('bancada');


        let modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nombre_p').text(nombre);
        modal.find('.modal-body #bancada').text(bancada);





    });
}


const showAutorizar = () => {
    $('#modalEdit').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let nombre = button.data('nombre');
        let descripcion = button.data('descripcion');
        let anexos = button.data('anexos');
        let proponente_id = button.data('proponente_id');
        let ponente = button.data('ponente');
        let coponente = button.data('coponente');
        let coordinador = button.data('coordinador');
        let comision_id = button.data('comision_id');
        let estado = button.data('estado');

        let modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nombre_e').val(nombre);
        modal.find('.modal-body #descripcion_e').val(descripcion);
        modal.find('.modal-body #anexos_e').val(anexos);
        modal.find('.modal-body #ponente_e').val(ponente);
        modal.find('.modal-body #coponente_e').val(coponente);
        modal.find('.modal-body #coordinador_e').val(coordinador);
        modal.find('.modal-body #estado_e').val(estado);
        $("#proponente_id option[value='" + proponente_id + "']").attr("selected", true);
        $("#comision_id option[value='" + comision_id + "']").attr("selected", true);


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

//visibilidad del proyecto
const changeEstadoVista = (url) => {
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