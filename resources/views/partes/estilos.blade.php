<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Sistema Votaciones</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('img/icon.png') }}" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="{{asset('js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/atlantis.min.css')}}">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('css/demo.css')}}">
	
<link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/filas.css') }}" rel="stylesheet" type="text/css">




	<link href="{{asset('teclado/jquery.ml-keyboard.css')}}" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<style>
		.page-item.active .page-link {
        color: #fff !important;
        background-color: #589B4E !important;
        border-color: #589B4E !important; 
    }

    .page-link {
        color: #589B4E !important;
        background-color: #fff !important;
        border: 1px solid #dee2e6 !important; 
    }

    .page-link:hover {
        color: #fff !important;
        background-color: #589B4E !important;
        border-color: #589B4E !important; 
    }

input.parsley-error,
select.parsley-error,
textarea.parsley-error {    
    border-color:#6E2C2C;
    box-shadow: none;
}


input.parsley-error:focus,
select.parsley-error:focus,
textarea.parsley-error:focus {    
    border-color:#6E2C2C;
    box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
}
	</style>