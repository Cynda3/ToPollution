<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Topollution</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Topollution<span>@lang('navMenu.dataMap')</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span>@lang('navMenu.menu')
	      </button>
        
        <!-- Botones provisionales traducción  -->

        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
    
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @lang('navMenu.language') <span class="caret"></span>
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('locale/en') }}"><img src="images/en.jpeg" width="30px" height="20x"> English</a>
                        <a class="dropdown-item" href="{{ url('locale/es') }}"><img src="images/es.png" width="30px" height="20x"> Spanish</a>
                        
                    </div>
                </li>
        </ul>
        

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
              @if(auth()->user())
                <li class="nav-item"><a href="{{route('users.show', auth()->user()->id)}}" class="nav-link">{{auth()->user()->name}}</a></li>
              @else
              <li data-toggle="modal" data-target="#ModalLoginForm"><a href="#home" class="nav-link">{{ __('Login') }}</a></li>
                        <div id="ModalLoginForm" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h1>Log In!</h1>
                                    <form role="form" method="POST" action="{{ route('login') }}">
                                      @csrf
                                        <div class="form-group">
                                            <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                                            <div>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> <div class="form-group">
                                            <label for="password" class="control-label">{{ __('Password') }}</label>
                                            <div>
                                                <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
              @endif
              <li class="nav-item active"><a href="#home" class="nav-link">{{ __('navMenu.menu') }}</a></li>
	          <li class="nav-item"><a href="#about" class="nav-link">@lang('navMenu.about')</a></li>
	          <li class="nav-item"><a href="#work" class="nav-link">@lang('navMenu.work')</a></li>
	          <li class="nav-item"><a href="#team" class="nav-link">@lang('navMenu.team')</a></li>
	          <li class="nav-item"><a href="#news" class="nav-link">@lang('navMenu.news')</a></li>
	          <li class="nav-item"><a href="#contact" class="nav-link">@lang('navMenu.contact')</a></li>
            <li><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalRegisterForm">Register</button></li>
                        <div id="ModalRegisterForm" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h1>@lang('navMenu.create2')</h1>
                                    <form role="form" method="POST" action="{{ route('register') }}">
                                      @csrf
                                        <input type="hidden" name="_token" value="">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('Name') }}</label>
                                            <div>
                                                <input type="text" class="form-control input-lg @error('name') is-invalid @enderror" name="name" value="">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">{{ __('E-Mail Address') }}</label>
                                            <div>
                                                <input type="email" class="form-control input-lg @error('email') is-invalid @enderror" name="email" value="">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">{{ __('Password') }}</label>
                                            <div>
                                                <input type="password" class="form-control input-lg  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">{{ __('Confirm Password') }}</label>
                                            <div>
                                                <input type="password" class="form-control input-lg" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div id="home" class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-end" data-scrollax-parent="true">
          <div class="col-md-8 text-justify ftco-animate mb-5 pr-lg-4">
          	<a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4">
            	<div class="icon d-flex align-items-center justify-content-center">
            		<span class="ion-ios-play"></span>
            	</div>
            	<div class="heading-title ml-3">
	            	<span>@lang('navMenu.watch')</span>
            	</div>
            </a>
          	<h1 class="mb-0">@lang('navMenu.track')</h1>
          	<h3 class="subheading mb-4 pb-1"><a href="/register">@lang('navMenu.register')</a></h3>
            

          </div>
        </div>
      </div>
    </div>

    <section id="about" class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
        <div class="row no-gutters">
    			<div class="col-lg-6 py-4 py-md-5">
    				<div class="d-flex services ftco-animate text-lg-right py-4 px-lg-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-praying"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">@lang('navMenu.air')</h3>
	              <p>@lang('navMenu.air2')</p>
	            </div>
	          </div>
	          <div class="d-flex services active ftco-animate text-lg-right py-4 px-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-church"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">@lang('navMenu.enviroment')</h3>
	              <p>@lang('navMenu.enviroment2')</p>
	            </div>
	          </div>
	          <div class="d-flex services ftco-animate text-lg-right py-4 px-lg-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-bible"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">@lang('navMenu.water')</h3>
	              <p>@lang('navMenu.water2')</p>
	            </div>
	          </div>

	          <div class="d-flex services ftco-animate text-lg-right py-4 px-lg-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-social-care"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">@lang('navMenu.land')</h3>
	              <p>@lang('navMenu.land2') </p>
	            </div>
	          </div>
	          <div class="d-flex services ftco-animate text-lg-right py-4 px-lg-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-rings"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">@lang('navMenu.light')</h3>
	              <p>@lang('navMenu.light2')</p>
	            </div>
	          </div>
	          <div class="d-flex services ftco-animate text-lg-right py-4 px-lg-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-promotion"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">@lang('navMenu.termal')</h3>
	              <p>@lang('navMenu.termal2')</p>
	            </div>
	          </div>
    			</div>

    			<div class="col-md-6 d-flex align-items-stretch">
    				<div class="img img-about" style="background-image: url(images/about.jpg);"></div>
    			</div>
    		</div>
    	</div>
    </section>

    <section id="work" class="ftco-counter" id="section-counter">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-6 d-flex flex-column align-items-stretch">
    				<div class="img d-flex align-self-stretch align-items-center justify-content-center" style="background-image:url(images/about-2.jpg);">
    					<a href="https://www.youtube.com/watch?v=ism1XqnZJEg" class="icon-video popup-vimeo d-flex align-items-center justify-content-center text-center">
    						<span class="ion-ios-play"></span>
    					</a>
    				</div>
    			</div>
    			<div class="col-md-6 px-md-5 py-4 py-md-5">
    				<div class="row justify-content-start pt-md-3 pb-md-3">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4">@lang('navMenu.convince')</h2>
		            <p>@lang('navMenu.convince2')</p>
		          </div>
		        </div>
		    		<div class="row">
		          <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 mb-4">
		              <div class="text">

		                <strong class="number" data-number="10000">0</strong>
		                <span>@lang('navMenu.sensors')</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 mb-4">
		              <div class="text">

		                <strong class="number" data-number="6000">0</strong>
		                <span>@lang('navMenu.members')</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 mb-4">
		              <div class="text">

		                <strong class="number" data-number="2000">0</strong>
		                <span>@lang('navMenu.citys')</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 mb-4">
		              <div class="text">

		                <strong class="number" data-number="50">0</strong>
		                <span>@lang('navMenu.countries')</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section id="team" class="ftco-section testimony-section img" style="background-image: url(images/bg_3.jpg);">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-2">@lang('navMenu.team2')</h2>
          </div>
        </div>
        <div class="row justify-content-center ftco-animate">
          <div class="col-md-8">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text p-3">
                    <p class="mb-4">@lang('navMenu.develop')</p>
                    <p class="name">Asier Fernández</p>
                    <span class="position">@lang('navMenu.develop2')</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text p-3">
                    <p class="mb-4">@lang('navMenu.develop3')</p>
                    <p class="name">Ander González</p>
                    <span class="position">@lang('navMenu.develop4')</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text p-3">
                    <p class="mb-4">@lang('navMenu.develop5')</p>
                    <p class="name">Jon Imanol</p>
                    <span class="position">@lang('navMenu.develop6')</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_4.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text p-3">
                    <p class="mb-4">@lang('navMenu.develop7')Web developer</p>
                    <p class="name">Andrés Rojas</p>
                    <span class="position">@lang('navMenu.develop8')</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="news" class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-12 text-center heading-section heading-section-light ftco-animate">
          	<span class="subheading">@lang('navMenu.news')</span>
            <h2 class="mb-2"><span class="px-4">@lang('navMenu.rnews')</span></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
            	<div class="text">
                <div class="meta mb-0 pl-md-5">
                  <div><a href="#">Nov 22, 2019</a></div>
                  <div><a href="#">BBC</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading pl-md-5"><a href="#">@lang('navMenu.india')</a></h3>
              </div>
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text py-3">
                <div class="desc pl-md-5">
	                <p>@lang('navMenu.court')</p>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
            	<div class="text">
                <div class="meta mb-0 pl-md-5">
                  <div><a href="#">Nov 18, 2019</a></div>
                  <div><a href="#">BBC</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading pl-md-5"><a href="#">@lang('navMenu.bristol')</a></h3>
              </div>
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text py-3">
                <div class="desc pl-md-5">
	                <p>@lang('navMenu.richard')</p>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
            	<div class="text">
                <div class="meta mb-0 pl-md-5">
                  <div><a href="#">Nov 10, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading pl-md-5"><a href="#">@lang('navMenu.pakistan')</a></h3>
              </div>
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text py-3">
                <div class="desc pl-md-5">
	                <p>@lang('navMenu.three')</p>
	              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="contact" class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-2 bread">@lang('navMenu.contact2')</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">@lang('navMenu.home2') <i class="ion-ios-arrow-forward"></i></a></span> <span>@lang('navMenu.contact3')<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">@lang('navMenu.cinfo')</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>@lang('navMenu.address')</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
          </div>
          <div class="col-md-3">
            <p><span>@lang('navMenu.phone')</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
          </div>
          <div class="col-md-3">
            <p><span>@lang('navMenu.email')</span> <a href="mailto:info@yoursite.com">info@topollution.com</a></p>
          </div>
          <div class="col-md-3">
            <p><span>@lang('navMenu.website')</span> <a href="#">topollution.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-lg-6 order-md-last d-flex">
            <form action="{{Route('contacts.store')}}" method="post" class="bg-light p-5 contact-form">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email" name="email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" name="subject">
              </div>
              <div class="form-group">
                <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>

          </div>

          <div class="col-lg-6 d-flex">
            <div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Topollution</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">@lang('navMenu.about')</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Staff</a></li>
                <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Zubiri</a></li>
                <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Don bosco</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
