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
  <link href="{{ URL::asset('/css/grayscale.css') }}" rel="stylesheet">
  @include('includes.modales.modalInicioSesion')
  @include('includes.modales.modalRegistro')

  <!-- Register validation-->
  <script src="{{ URL::asset('/js/validacion.js') }}"></script>

  <!-- Custom styles for buttons -->
  <link href="{{ URL::asset('css/botones.css') }}" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">ToPollution</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        @lang('navMenu.menu')
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger px-0 px-lg-3" href="#about">@lang('navMenu.about')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger px-0 px-lg-3" href="#projects">@lang('navMenu.ourWork')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger px-0 px-lg-3" href="#signup">@lang('navMenu.contact')</a>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              @lang('navMenu.language') <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('locale/en') }}">
                @lang('navMenu.english')
              </a>
              <a class="dropdown-item" href="{{ url('locale/es') }}">
                @lang('navMenu.spanish')
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger px-0 px-lg-3" href="{{route('shop')}}">
              @lang('navMenu.tienda')
            </a>
          </li>
          @if(Auth::user())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              {{Auth::user()->name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if(Auth::user()->role_id == "2")
              <a class="dropdown-item" href="{{route('admin')}}">Admin menu</a>
              @endif
              <a class="dropdown-item" href="{{route('users.show', Auth::user()->id)}}">@lang('navMenu.profile')</a>
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
            <button type="button" class="btn btn-success p-2 mt-3 mt-lg-4 ml-lg-2" data-toggle="modal"
              data-target="#inicioSesionModal">
              @lang('navMenu.login')
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-success p-2 mt-3 mt-lg-4 mb-3 mb-lg-0 ml-lg-3" data-toggle="modal"
              data-target="#registroModal">
              @lang('navMenu.register')
            </button>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">ToPollution</h1>
        <h2 class="text-white mx-auto mt-2 mb-5">@lang('navMenu.subtitle')</h2>
        @if(Auth::user())
        @else
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registroModal">
          @lang('navMenu.register')
        </button>
        @endif
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="about-section text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-white mb-4">@lang('navMenu.eslogan')</h2>
          <p class="text-white-50">@lang('navMenu.subslogan')</p>
        </div>
      </div>
      <div class="col-lg-10 mx-auto">
        <div class="row justify-content-center">
          <div class="mx-4 mb-5">
            <strong class="number text-white display-4" data-number="10000">10.000</strong><br>
            <span style="color: #28a745!important" class="text-primary h5">@lang('navMenu.sensores')</span>
          </div>
          <div class="mx-4">
            <strong class="number text-white display-4" data-number="6000">6.000</strong><br>
            <span style="color: #28a745!important" class="text-primary h5">@lang('navMenu.miembros')</span>
          </div>
          <div class="mx-4">
            <strong class="number text-white display-4" data-number="2000">2.000</strong><br>
            <span style="color: #28a745!important" class="text-primary h5">@lang('navMenu.ciudades')</span>
          </div>
          <div class="mx-4">
            <strong class="number text-white display-4" data-number="50">50</strong><br>
            <span style="color: #28a745!important" class="text-primary h5">@lang('navMenu.paises')</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light">
    <div class="container">

      <!-- Featured Project Row -->
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="img/enviroment3.jpg" alt="">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>@lang('navMenu.airTitle')</h4>
            <p class="text-black-50 mb-0">@lang('navMenu.airText')</p>
          </div>
        </div>
      </div>

      <!-- Project One Row -->
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-lg-6">
          <img class="img-fluid" src="img/enviroment1.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-primary text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white">@lang('navMenu.noiseTitle')</h4>
                <p class="mb-0 text-white-50">@lang('navMenu.noiseText')</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Project Two Row -->
      <div class="row justify-content-center no-gutters">
        <div class="col-lg-6">
          <img class="img-fluid" src="img/ground.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="bg-primary text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-right">
                <h4 class="text-white">@lang('navMenu.groundTitle')</h4>
                <p class="mb-0 text-white-50">@lang('navMenu.groundText')</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>
  </section>

  <!-- Signup Section -->
  <section id="signup" class="signup-section">
    <div class="container">

      <div class="col-md-10 col-lg-8 mx-auto text-center">

        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
        <h2 class="text-white mb-5">@lang('navMenu.contact')</h2>

        <form action="{{ Route('contacts.store') }}" method="POST" class="text-left text-white">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlInput1">@lang('navMenu.name')</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">@lang('navMenu.subject')</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Subject" name="subject">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">@lang('navMenu.email')</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Example@email.com "
              name="email">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">@lang('navMenu.message')</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
          </div>
          <button type="submit" class="btn btn-success mx-auto">@lang('navMenu.enviar')</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact-section bg-black">
    <div class="container">

      <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-map-marked-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">@lang('navMenu.address')</h4>
              <hr class="my-4">
              <div class="small text-black-50">Calle de alejandria, 2</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">@lang('navMenu.email')</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                topollution@gmail.com
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">@lang('navMenu.phone')</h4>
              <hr class="my-4">
              <div class="small text-black-50">+34 943 89 92 93</div>
            </div>
          </div>
        </div>
      </div>

      <div class="social d-flex justify-content-center align-content-center">
        <a href="#" class="mx-2">
          <span class="fab fa-twitter"></span>
        </a>
        <a href="#" class="mx-2">
          <span class="fab fa-facebook-f"></span>
        </a>
        <a href="#" class="mx-2">
          <span class="fab fa-instagram"></span>
        </a>
        <a href="#" class="mx-2">
          <span class="fab fa-github"></span>
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
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

</body>

</html>