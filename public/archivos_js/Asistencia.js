$(function() {

    
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

