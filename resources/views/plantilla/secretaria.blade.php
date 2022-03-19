<?php
# Iniciando la variable de control que permitirá mostrar o no el modal
$exibirModal = false;
# Verificando si existe o no la cookie
if (!isset($_COOKIE['mostrarModal'])) {
# Caso no exista la cookie entra aquí
# Creamos la cookie con la duración que queramos

//$expirar = 3600; // muestra cada 1 hora
//$expirar = 10800; // muestra cada 3 horas
//$expirar = 21600; //muestra cada 6 horas
$expirar = 3600; //muestra cada 12 horas
//$expirar = 86400; // muestra cada 24 horas
setcookie('mostrarModal', 'SI', time() + $expirar); // mostrará cada 12 horas.
# Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
$exibirModal = true;
}
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('partes/estilos')
    @php

    $mes=date('m');
    $dia=date('d');
    $cumple=DB::table('personas')->whereMonth('fecha_nac',$mes)
    ->whereDay('fecha_nac',$dia)->get();
    $cantidad=count($cumple);
    @endphp
    @yield('head')
</head>

<body >
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            @include('partes/navbar')
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        @include('partes/sidebar_secretaria')
        <div class="main-panel">
            <div class="content">

                @yield('content')

            </div>
            @include('partes/footer')
        </div>
        @include('partes/modalcumpleaños')
    </div>

    @include('partes/script')
    <script src="{{ asset('archivos_js/init.js') }}"></script>
    <script src="{{ asset('archivos_js/Salir.js') }}"></script>
    @yield('scripts')
    <?php if ($exibirModal === true):// Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario.
    ?>
    <script>
        $(document).ready(function() {
            // id de nuestro modal
            $("#modalInicio").modal("show");
        });

    </script>
    <?php endif; ?>
    
</body>

</html>
