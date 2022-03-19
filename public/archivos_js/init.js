$(function () {
    ajaxHeader();



})

const ajaxHeader = () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

}

function disableEnterKey(e) {
    let key;
    if (window.event) {
        key = window.event.keyCode; //IE
    } else {
        key = e.which; //firefox
    }
    if (key == 13) {
        return false;
    } else {
        return true;
    }
}


/*mensaje de guardado*/
const success = (mensaje) => {

    swal({
        title: '',
        text: `${mensaje}`,
        type: 'success',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#589B4E',
        cancelButtonText: 'Cancelar',
        cancelButtonColor:'#B43437'

    })


}



/*mensaje de error*/
const warning = (mensaje) => {
    swal({
        title: '',
        text: `${mensaje}`,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#589B4E',
        cancelButtonText: 'Cancelar',
        cancelButtonColor:'#B43437'

    })
}

const error = (mensaje) => {
    swal({
        title: '',
        text: `${mensaje}`,
        type: 'error',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#589B4E',
        cancelButtonText: 'Cancelar',
        cancelButtonColor:'#B43437'

    })
}


const addErrorMessage = (errors) => {
    let messages = "";
    $.each(errors, function (key, value) {

        if ($.isPlainObject(value)) {
            $.each(value, function (key, value) {
                messages = messages + "<li><span class='font-bold text-danger'>" + value + "</span></li><br/>";
            });
        }
    });
    showErrorMessage(messages);
}


const showErrorMessage = (messages) => {
    swal({
        title: '<strong>Error: Datos Incorrectos</strong>!',
        type: 'warning',
        html: messages,
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#589B4E',
        cancelButtonText: 'Cancelar',
        cancelButtonColor:'#B43437'
    })

}

/*recarga-actualizar tbla*/
const updateTable = () => {
    let form = $('#form_hidden');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        success: function (data) {
            if (data.warning) {
                warning(data.warning);
            } else {
                $('#basic-datatables').html("");
                $('#basic-datatables').html(data);

                //dataTableInit();

            }
        }
    });
}
