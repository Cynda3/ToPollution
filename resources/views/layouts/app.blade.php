<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>ToPollution</title>
  

    <!-- Jquery -->
    <script src="{{ URL::asset('/necessary/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('/necessary/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset('/necessary/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('/css/stickyFooter.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/grayscale.css') }}" rel="stylesheet">
    @if(Auth::user())
    @else
        @include('includes.modales.modalInicioSesion')
        @include('includes.modales.modalRegistro')
    @endif
    
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-black " id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{ route('home') }}">ToPollution</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @lang('navMenu.language') <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('locale/en') }}">
                                <img src="{{ URL::asset('/img/languajes/en.png') }}" width="30px" height="20x">
                                English
                            </a>
                            <a class="dropdown-item" href="{{ url('locale/es') }}">
                                <img src="{{ URL::asset('/img/languajes/es.png') }}" width="30px" height="20x">
                                Spanish
                            </a>
                        </div>
                    </li>
                    @if(Auth::user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('users.show', Auth::user()->id)}}">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('home', Auth::user()->id)}}">Sensors</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <button type="button" class="btn btn-dark p-2 mt-3 mt-lg-4 ml-lg-2" data-toggle="modal"
                            data-target="#ModalLoginForm">
                            Log in
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-dark p-2 mt-3 mt-lg-4 mb-3 mb-lg-0 ml-lg-3"
                            data-toggle="modal" data-target="#ModalRegisterForm">
                            Register
                        </button>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50 footer">
        <div class="container">
            Copyright &copy; ToPollution <script>document.write(new Date().getFullYear());</script>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('/necessary/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ URL::asset('/necessary/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ URL::asset('/js/grayscale.min.js"></script>

</body>

</html>