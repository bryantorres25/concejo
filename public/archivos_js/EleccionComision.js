$(document).ready(function() {

    $("#form_create").submit(function(event) {
        event.preventDefault();

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



    });
    $('#bt_add').click(function() {
        agregar();
    });
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
                swal({
                    title: 'Sistema de Votación',
                    text: data.success,
                    type: 'success',
                    allowOutsideClick: false,
                    confirmButtonColor: '#589B4E',
                }).then((Delete) => {
                    if (Delete) {
                        $('#opciones').hide();
                        window.location.href = '../eleccion-comisiones';
                    } else {
                        window.location.href = '../eleccion-comisiones';
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

var cont = 0;
total = 0;
subtotal = [];

$('#guardar').hide();

function agregar() {

    persona_id = $('#persona_id').val();
    comision_id = $('#comision_id').val();
    persona = $('#persona_id option:selected').text();
    comision = $('#comision_id option:selected').text();

    if (persona_id != "" && comision != "") {


        var fila = '<tr class="selected" id="fila' + cont + '"><td><button class="btn btn-sm btn-danger btn-icon-text" type="button" onclick="eliminar(' + cont + ');">Quitar</button></td><td><input type="hidden" name="persona_id[]" value="' + persona_id + '">' + persona + '</td><td><input type="hidden" name="comision_id[]" value="' + comision_id + '">' + comision + '</td></tr>'
        cont++;



        $('#detalles').append(fila);

    } else {
        alert("Error, Verifique que no existan campos vacios");
    }
}




function eliminar(index) {

    $('#fila' + index).remove();

}