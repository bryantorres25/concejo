<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Sistema de Votaciones</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cssl/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cssl/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cssl/vendors/styles/style.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
		<!-- Bootstrap -->
     <link rel="stylesheet" type="text/css" href="{{ asset('teclado_numerico/jquery.numpad.css') }}">
    
		<style type="text/css">
			.nmpd-grid {border: none; padding: 20px;}
			.nmpd-grid>tbody>tr>td {border: none;}
			
			/* Some custom styling for Bootstrap */
			.qtyInput {display: block;
			  width: 100%;
			  padding: 6px 12px;
			  color: #555;
			  background-color: white;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
			  box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
			  -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
			  -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
			  transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
			}
		</style>
    
</head>

<body class="login-page" style="background-color: " #fff">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <img src="{{ asset('img/icon.png') }}" width="60px" alt="">
            </div>
            <div class="login-menu" style="color: darkgreen">
               
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center ">
        <div class="container " style="background: #fff">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="600px">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-danger">Inicio de Sesión</h2>
                        </div>
                        <form method="POST" action="{{route('login')}}">
                            @csrf

                            <div class="input-group custom">
                                <input id="email" type="number"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required  
                                    class="form-control form-control-lg" placeholder="Usuario">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group custom">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required  class="form-control form-control-lg"
                                    placeholder="****">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group " style="align-content: center">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success w-md waves-effect waves-light">
                                        {{ __('Ingresar') }} <i class="fa fa-arrow-alt-circle-right"></i>
                                    </button>

                                    </ </form>
                                </div>
							</div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- js -->
            <script src="{{ asset('cssl/vendors/scripts/core.js') }}"></script>
            <script src="{{ asset('cssl/vendors/scripts/script.min.js') }}"></script>
            <script src="{{ asset('cssl/vendors/scripts/process.js') }}"></script>
            <script src="{{ asset('cssl/vendors/scripts/layout-settings.js') }}"></script>
            <script src="{{ asset('teclado_numerico/jquery.numpad.js') }}"></script>

<script type="text/javascript">
        // Set NumPad defaults for jQuery mobile. 
        // These defaults will be applied to all NumPads within this document!
        $.fn.numpad.defaults.gridTpl = '<table class="table modal-content"></table>';
        $.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
        $.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control" />';
        $.fn.numpad.defaults.buttonNumberTpl =  '<button type="button" class="btn btn-default btn-sm"></button>';
        $.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn" style="width: 100%;"></button>';
        $.fn.numpad.defaults.onKeypadCreate = function(){$(this).find('.done').addClass('btn-success');};
        
        // Instantiate NumPad once the page is ready to be shown
        $(document).ready(function(){
            $('#email').numpad();
            $('#password').numpad({
                displayTpl: '<input class="form-control" type="password" />',
                hidePlusMinusButton: true,
                hideDecimalButton: true	
            });
        });
    </script>




</body>

</html>
