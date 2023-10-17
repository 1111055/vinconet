<!doctype html>
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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'MyVinco') }}
                </a>
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

            <div class="col-md-2">
            <aside>
                 
                  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                    <div class="position-sticky">
                      <div class="list-group list-group-flush mx-3 mt-4">
                        <a
                          href="#"
                          class="list-group-item list-group-item-action py-2 ripple"
                          aria-current="true"
                        >
                          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Home</span>
                        </a>
                        <a href="{{ route('certificado') }}" class="list-group-item list-group-item-action py-2 ripple active">
                          <i class="fas fa-file fa-fw me-3"></i><span>Download 3.1 Certificates</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                          ><i class="fa fa-product-hunt fa-fw me-3"></i><span>Stock Availability</span></a
                        >

                        <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                          <i class="fas fa-file fa-fw me-3"></i><span>Invoices</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                          ><i class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a
                        >
                        <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                          ><i class="fas fa-file fa-fw me-3"></i><span>Quotations</span></a
                        >
                        <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                          ><i class="fas fa-truck fa-fw me-3"></i><span>Delivery Notes</span></a
                        >
                      <a href="{{ route('user') }}" class="list-group-item list-group-item-action py-2 ripple"
                          ><i class="fas fa-truck fa-fw me-3"></i><span>Utilizadores</span></a
                        >
                       <a href="{{ route('role') }}" class="list-group-item list-group-item-action py-2 ripple"
                          ><i class="fas fa-truck fa-fw me-3"></i><span>Roles</span></a
                        >
                      </div>
                    </div>
                  </nav>
                  <!-- Sidebar -->
            </aside>
        </div>
        <div class="col-md-10">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
