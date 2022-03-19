$(function() {

    $('form').parsley();


    $("#form_create").submit(function(event) {
        event.preventDefault();
        form = document.forms.namedItem("form_create");
        formData = new FormData(form);
        reader = new FileReader();
        console.log(formData.get("ruta"));
        save();
    });

    $("#form_edit").submit(function(event) {
        event.preventDefault();
        form = document.forms.namedItem("form_edit");
        formData = new FormData(form);
        reader = new FileReader();
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
        let nombre = button.data('nombre');
        let bancada = button.data('bancada');
        let descripcion = button.data('descripcion');


        let modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nombre_e').val(nombre);
        modal.find('.modal-body #bancada_e').val(bancada);
        modal.find('.modal-body #descripcion_e').val(descripcion);


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
                                window.location.href = 'proposiciones';
                            } else {
                                window.location.href = 'proposiciones';
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