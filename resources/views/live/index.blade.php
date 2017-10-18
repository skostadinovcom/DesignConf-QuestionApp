@section('page_title', 'Стена на живо')

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title') - Design Conf Guide</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/materialize/css/materialize.min.css') }}"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/styles/main.css') }}">
</head>
<body>
    <section id="live-element"></section>
<!-- SCRIPTS -->
<script src="{{ asset('/assets/js/jquery-3.2.1.min.js')  }}"></script>
<script src="{{ asset('/bootstrap/js/bootstrap.min.js')  }}"></script>
<script src="{{ asset('/materialize/js/materialize.min.js') }}"></script>
<script src="{{ asset('/assets/js/app.js')  }}"></script>
</body>
</html>