<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyVinco') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


   <link rel="stylesheet" href="{{ asset('resources/sass/app.scss') }}">


   <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}">


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    



   <script src="https://kit.fontawesome.com/58530aad31.js" crossorigin="anonymous"></script>

  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/skin-blue.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
  <link rel="stylesheet" href="{{ asset('css/multiselect.css') }}">
  <link href="{{ asset('backend/fontawesome//css/all.css') }}" rel="stylesheet"> <!--load all styles -->

<!-- Font Awesome -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">

 


  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<body>
    <div id="app">
        <div class="col-md-10 mt-5 mb-5 text-center">
            <main class="py-4">
                 <img src="{{URL::asset('backend/dist/img/logo.png')}}" alt="Logo" style="max-width: 48%;">
            </main>
        </div>
        <div class="col-md-10 mt-5">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
