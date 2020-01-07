<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ToPollution</title>

  <!-- Jquery -->
  <script src="/necessary/jquery/jquery.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="/necessary/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/necessary/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.css" rel="stylesheet">
  @include('includes.modales.modalInicioSesion')
  @include('includes.modales.modalRegistro')

  <!-- Register validation-->
  <script src="/js/validacion.js"></script>

  <!-- Custom styles for buttons -->
  <link href="css/botones.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">ToPollution</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger px-0 px-lg-3" href="#about">@lang('navMenu.about')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger px-0 px-lg-3" href="#projects">Our work</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger px-0 px-lg-3" href="#signup">Contacto</a>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              @lang('navMenu.language') <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('locale/en') }}">
                <img src="img/languajes/en.png" width="30px" height="20x">
                English
              </a>
              <a class="dropdown-item" href="{{ url('locale/es') }}">
                <img src="img/languajes/es.png" width="30px" height="20x">
                Spanish
              </a>
            </div>
          </li>
          @if(Auth::user())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              {{Auth::user()->name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('home', Auth::user()->id)}}">Profile</a>
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
              data-target="#inicioSesionModal">
              Log in
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-dark p-2 mt-3 mt-lg-4 mb-3 mb-lg-0 ml-lg-3" data-toggle="modal"
              data-target="#registroModal">
              Register
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
        <h2 class="text-white-50 mx-auto mt-2 mb-5">Track your city pollution data with your own sensors.</h2>
        @if(Auth::user())
        @else
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroModal">
          Register
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
          <h2 class="text-white mb-4">We try to convince people with real data</h2>
          <p class="text-white-50">Our sensors are day after day tracking data of their enviroment to show it with
            graphics and maps. We choose this way to show people the impact of our daily rutins in the enviroment.</p>
        </div>
      </div>
      <div class="col-lg-10 mx-auto">
        <div class="row justify-content-center">
          <div class="mx-4 mb-5">
            <strong class="number text-white display-4" data-number="10000">10.000</strong><br>
            <span class="text-primary h5">Sensors</span>
          </div>
          <div class="mx-4">
            <strong class="number text-white display-4" data-number="6000">6.000</strong><br>
            <span class="text-primary h5">Members</span>
          </div>
          <div class="mx-4">
            <strong class="number text-white display-4" data-number="2000">2.000</strong><br>
            <span class="text-primary h5">Cities</span>
          </div>
          <div class="mx-4">
            <strong class="number text-white display-4" data-number="50">50</strong><br>
            <span class="text-primary h5">Countries</span>
          </div>
        </div>
      </div>
      <img src="img/pol.png" class="w-75 rounded" height="300px" alt="">

    </div>
  </section>

  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light">
    <div class="container">

      <!-- Featured Project Row -->
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="img/bg-masthead.jpg" alt="">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>Air-Pollution</h4>
            <p class="text-black-50 mb-0">Occurs when harmful or excessive quantities of substances including gases,
              particulates, and biological molecules are introduced into Earths atmosphere.</p>
          </div>
        </div>
      </div>

      <!-- Project One Row -->
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-lg-6">
          <img class="img-fluid" src="img/demo-image-01.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white">Enviroment noise</h4>
                <p class="mb-0 text-white-50">Is the propagation of noise with harmful impact on the activity of human
                  or animal life.</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Project Two Row -->
      <div class="row justify-content-center no-gutters">
        <div class="col-lg-6">
          <img class="img-fluid" src="img/demo-image-02.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-right">
                <h4 class="text-white">Land pollution</h4>
                <p class="mb-0 text-white-50">Is the degradation of the Earths surface caused by a misuse of resources
                  and improper disposal of waste.</p>
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
        <h2 class="text-white mb-5">Contact</h2>

        <form action="{{ Route('contacts.store') }}" method="POST" class="text-left text-white">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Asier" name="name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Subject</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Subject" name="subject">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Example@email.com " name="email">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary mx-auto">Send Message</button>
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
              <h4 class="text-uppercase m-0">Address</h4>
              <hr class="my-4">
              <div class="small text-black-50">Calle de alejandria, 2</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
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
              <h4 class="text-uppercase m-0">Phone</h4>
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
      Copyright &copy; ToPollution 2019
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="necessary/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="necessary/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>

</body>

</html>