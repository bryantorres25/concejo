$(function() {
    selectcomision();
    $("#buscar").click(function() {
        filtro();
    });
});

//guardar en el form
const filtro = () => {
    let form = $('#form_filtro');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            $('#resultado').html(data);

        }
    });

}


const selectcomision = () => {

    $("#tipo").change(function(event) {
        if (event.target.value > 0) {
            $("#comision_id").empty();
            $.get("comision/select/" + event.target.value, function(response) {
                for (i = 0; i < response.length; i++) {
                    $("#comision_id").append("<option value='" + response[i].id + "'>" + response[i].nombre + "</option>");
                }
            })
        } else {
            warning("Debe Seleccionar Un tipo de comisión");
        }


    })
}
