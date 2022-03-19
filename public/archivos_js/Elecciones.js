$(function() {
    $("#buscar").click(function() {
        filtro();
    });

});



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


