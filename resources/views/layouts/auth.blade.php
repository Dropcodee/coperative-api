<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="Landmark University co-operative loans and savings platform.">
     <meta name="keywords" content="landmark University,Loans, LMU Cooperative, land loan, cash loans, land loans">
     <meta name="author" content="FSTACKDEV">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/waves/waves.min.css') }}" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="{{ asset('assets/css/alpha.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- Javascripts -->
        <script src="{{asset('assets/plugins/jquery/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/plugins/waves/waves.min.js')}}"></script>
        <script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/js/alpha.min.js')}}"></script>
</body>
</html>
