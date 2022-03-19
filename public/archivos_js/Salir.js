$(function() {

    $("#btn-salir").click(function(event) {
        event.preventDefault();
        swal({
            title: 'Cerrar Sesión',
            text: "¿Está seguro de salir del Sistema ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
                confirmButtonColor: '#589B4E',
                cancelButtonText: 'Cancelar',
                cancelButtonColor:'#B43437',
            buttonsStyling: true  
        }).then(function() {
            $('#logout-form').submit();
        }, function(dismiss) {

        })
    });
});