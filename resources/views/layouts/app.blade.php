<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ToPollution</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('/images/favIcon.png') }}" />

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
    <!-- Register validation-->
    <script src="{{ URL::asset('/js/validacion.js') }}"></script>

    <!-- Custom styles for buttons -->
    <link href="{{ URL::asset('css/botones.css') }}" rel="stylesheet">
    @endif
    @yield('head')

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white text-dark border-bottom" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger text-dark" href="{{ route('home') }}">ToPollution</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item ">
                        <a class="nav-link text-dark" href="{{route('home')}}">
                            @lang('navMenu.mapas')
                        </a>
                    </li>
                    @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{route('devices.index')}}">
                            @lang('navMenu.dGlobales')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{route('users.index', Auth::user()->id)}}">
                            @lang('navMenu.misDisp')
                        </a>
                    </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @lang('navMenu.language') <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right text-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('locale/en') }}">
                                @lang('navMenu.english')
                            </a>
                            <a class="dropdown-item text-dark" href="{{ url('locale/es') }}">
                                @lang('navMenu.spanish')
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{route('shop')}}">
                            @lang('navMenu.tienda')
                        </a>
                    </li>
                    @if(Auth::user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu text-dark" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role_id == "2")
                            <a class="dropdown-item"
                            href="{{route('admin')}}">Admin menu</a>
                            @endif
                            <a class="dropdown-item"
                                href="{{route('users.show', Auth::user()->id)}}">@lang('navMenu.profile')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item " href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <button type="button" class="btn btn-success p-2 mt-3 mt-lg-4 ml-lg-2" data-toggle="modal"
                            data-target="#inicioSesionModal">
                            @lang('navMenu.login')
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-success p-2 mt-3 mt-lg-4 mb-3 mb-lg-0 ml-lg-3"
                            data-toggle="modal" data-target="#registroModal">
                            @lang('navMenu.register')
                        </button>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50 footer mt-5">
        <div class="container">
            Copyright &copy; ToPollution <script>
                document.write(new Date().getFullYear());
            </script>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('/necessary/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ URL::asset('/necessary/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ URL::asset('/js/grayscale.min.js') }}"></script>
    @yield('scripts')
</body>

</html>