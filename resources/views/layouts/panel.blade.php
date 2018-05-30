<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Facture</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/basicStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <!--script src="{{ asset('js/app.js') }}" defer></script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" ></script>
    @yield('script')
    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand whiteText" href="{{ url('/') }}">
                    E-Facture
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @auth
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link whiteText" href="#">
                                    {{ Auth::user()->username }}
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="nav-side-menu">
                <div class="brand">Panel Admin</div>
                <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
                <div class="menu-list">
                    <ul id="menu-content" class="menu-content collapse out">
                        <li data-toggle="collapse" data-target="#customers" class="collapsed active">
                        <i class="fa fa-address-book fa-lg fa-panel"></i>  Clients <span class="arrow"></span>
                        </li>
                        <ul class="sub-menu collapse" id="customers">
                                <li class="active"><a href="{{ url('/customers') }}">Liste des clients</a></li>
                                <li><a href="{{ url('/customers/create') }}">Ajouter un client</a></li>
                            </ul>
                        <li data-toggle="collapse" data-target="#invoices" class="collapsed">
                            <i class="fa fa-calculator fa-lg fa-panel"></i>  Factures <span class="arrow"></span>
                        </li>
                        <ul class="sub-menu collapse" id="invoices">
                            <li class=""><a href="{{ url('/invoices') }}">Liste des factures</a></li>
                            <li><a href="{{ url('/invoices/create') }}">Ajouter une facture</a></li>
                            <li><a href="{{ url('/generate') }}">Générer un pdf</a></li>
                            
                        </ul>
                        
                    <div class="signout">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-lg fa-panel"></i> Déconnexion
                            </a> 
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    </ul>
                </div>
            </div>
            <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
            <div id="content">
                @yield('content')
            </div>
            
    </div>    
</body>
</html>
