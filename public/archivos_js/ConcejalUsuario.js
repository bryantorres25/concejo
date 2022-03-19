$(function() {


    $("#form_edit").submit(function(event) {
        event.preventDefault();
        swal({
                title: 'Sistema de Votación',
                text: "¿Está seguro de guardar la información?",
                type: 'warning',
                confirmButtonText: 'Aceptar',
               confirmButtonColor: '#589B4E',
               cancelButtonText: 'Cancelar',
               cancelButtonColor:'#B43437',
                showCancelButton: true,

            }).then((Delete) => {
                if (Delete) {
                   let form = $('#form_edit');
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

                        window.location.href = 'home';
                    } else {
                        window.location.href = 'home';
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
                } else {
                    swal.close();
                }
            });
    });
});


</script>