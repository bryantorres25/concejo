$(function() {
    $('form').parsley();

    $("#form_create").submit(function(event) {
        event.preventDefault();
        form = document.forms.namedItem("form_create");
        formData = new FormData(form);
        reader = new FileReader();
        console.log(formData.get("foto"));
        save();
    });

    $("#form_edit").submit(function(event) {
        event.preventDefault();
        form = document.forms.namedItem("form_edit");
        formData = new FormData(form);
        reader = new FileReader();
        console.log(formData.get("foto"));
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
        let genero = button.data('genero');
        let telefono = button.data('telefono');
        let direccion = button.data('direccion');
        let correo = button.data('correo');
        let cargo_id = button.data('cargo_id');
        let partido_id = button.data('partido_id');
        let comision_id = button.data('comision_id');
        let fecha_nac = button.data('fecha_nac');

        let modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nombres_e').val(nombres);
        modal.find('.modal-body #apellidos_e').val(apellidos);
        modal.find('.modal-body #documento_e').val(documento);
        modal.find('.modal-body #genero_e').val(genero);
        modal.find('.modal-body #telefono_e').val(telefono);
        modal.find('.modal-body #direccion_e').val(direccion);
        modal.find('.modal-body #correo_e').val(correo);
        modal.find('.modal-body #fecha_nac_e').val(fecha_nac);

        $("#cargo_id option[value='" + cargo_id + "']").attr("selected", true);
        $("#partido_id option[value='" + partido_id + "']").attr("selected", true);
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
