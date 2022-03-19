$(function() {
    $('form').parsley();
    $("#form_create").submit(function(event) {
        event.preventDefault();
        form = document.forms.namedItem("form_create");
        formData = new FormData(form);
        reader = new FileReader();
        console.log(formData.get("foto"));
        console.log(formData.get("ruta"));
        save();
    });

    $("#form_edit").submit(function(event) {
        event.preventDefault();
        form = document.forms.namedItem("form_edit");
        formData = new FormData(form);
        reader = new FileReader();
        console.log(formData.get("foto"));
        console.log(formData.get("ruta"));
        update();
    });
    showEdit();
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
    $('#modalEdit').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let nombres = button.data('nombres');
        let apellidos = button.data('apellidos');
        let documento = button.data('documento');
        let telefono = button.data('telefono');
        let direccion = button.data('direccion');
        let eleccionsocial_id = button.data('eleccionsocial_id');

        let modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nombres_e').val(nombres);
        modal.find('.modal-body #apellidos_e').val(apellidos);
        modal.find('.modal-body #documento_e').val(documento);
        modal.find('.modal-body #telefono_e').val(telefono);
        modal.find('.modal-body #direccion_e').val(direccion);
        $("#eleccionsocial_id option[value='" + eleccionsocial_id + "']").attr("selected", true);

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
