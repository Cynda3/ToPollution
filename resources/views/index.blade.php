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
	      <a class="navbar-brand" href="index.html">Topollution<span>Daily Pollution data map</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
              @if(auth()->user())
                <li class="nav-item"><a href="{{route('users.show', auth()->user()->id)}}" class="nav-link">{{auth()->user()->name}}</a></li>
              @else
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
              @endif
	          <li class="nav-item active"><a href="#home" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="#work" class="nav-link">Our work</a></li>
	          <li class="nav-item"><a href="#team" class="nav-link">Team</a></li>
	          <li class="nav-item"><a href="#news" class="nav-link">News</a></li>
	          <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>

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
	            	<span>Watch about daily pollution</span>
            	</div>
            </a>
          	<h1 class="mb-0">Track your city pollution data with your owns sensors</h1>
          	<h3 class="subheading mb-4 pb-1"><a href="/register">Register here</a></h3>
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
	              <h3 class="heading mb-3">Air pollution</h3>
	              <p>Occurs when harmful or excessive quantities of substances including gases, particulates, and biological molecules are introduced into Earth's atmosphere.</p>
	            </div>
	          </div>
	          <div class="d-flex services active ftco-animate text-lg-right py-4 px-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-church"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">Enviroment noise</h3>
	              <p>Is the propagation of noise with harmful impact on the activity of human or animal life.</p>
	            </div>
	          </div>
	          <div class="d-flex services ftco-animate text-lg-right py-4 px-lg-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-bible"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">Water pollution</h3>
	              <p>Is the contamination of any body of water (lakes, groundwater, oceans, etc).</p>
	            </div>
	          </div>

	          <div class="d-flex services ftco-animate text-lg-right py-4 px-lg-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-social-care"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">Land pollution</h3>
	              <p>Is the degradation of the Earth's surface caused by a misuse of resources and improper disposal of waste. </p>
	            </div>
	          </div>
	          <div class="d-flex services ftco-animate text-lg-right py-4 px-lg-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-rings"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">Light pollution</h3>
	              <p>Is the brightening of the night sky inhibiting the visibility of stars and planets by the use of improper lighting of communities.</p>
	            </div>
	          </div>
	          <div class="d-flex services ftco-animate text-lg-right py-4 px-lg-4">
	            <div class="icon order-md-last d-flex align-items-center justify-content-center"><span class="flaticon-promotion"></span></div>
	            <div class="media-body pr-lg-4">
	              <h3 class="heading mb-3">Termal pollution</h3>
	              <p>Is the increase of temperature caused by human activity.</p>
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
		            <h2 class="mb-4">We try to convince people with real data</h2>
		            <p>Our sensors are day after day tracking data of their enviroment to show it with graphics and maps. We choose this way to show people the impact of our daily rutins in the enviroment.</p>
		          </div>
		        </div>
		    		<div class="row">
		          <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 mb-4">
		              <div class="text">
		              	
		                <strong class="number" data-number="10000">0</strong>
		                <span>Sensors</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 mb-4">
		              <div class="text">
		              	
		                <strong class="number" data-number="6000">0</strong>
		                <span>Members</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 mb-4">
		              <div class="text">
		              	
		                <strong class="number" data-number="2000">0</strong>
		                <span>Citys</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 mb-4">
		              <div class="text">
		              	
		                <strong class="number" data-number="50">0</strong>
		                <span>Countries</span>
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
            <h2 class="mb-2">Our team</h2>
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
                    <p class="mb-4">Web developer</p>
                    <p class="name">Asier Fernández</p>
                    <span class="position">Member</span>
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
                    <p class="mb-4">Web developer</p>
                    <p class="name">Ander González</p>
                    <span class="position">Member</span>
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
                    <p class="mb-4">Web developer</p>
                    <p class="name">Jon Imanol</p>
                    <span class="position">Member</span>
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
                    <p class="mb-4">Web developer</p>
                    <p class="name">Andrés Rojas</p>
                    <span class="position">Member</span>
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
          	<span class="subheading">News</span>
            <h2 class="mb-2"><span class="px-4">Recent News</span></h2>
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
                <h3 class="heading pl-md-5"><a href="#">India pollution: Supreme Court says world 'laughing' at smog issues</a></h3>
              </div>
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text py-3">
                <div class="desc pl-md-5">
	                <p>The court came down heavily on federal and state governments over what it sees as a failure to curb pollution levels. </p>
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
                <h3 class="heading pl-md-5"><a href="#">Bristol diesel ban: Gas boss warns over bankruptcy worry</a></h3>
              </div>
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text py-3">
                <div class="desc pl-md-5">
	                <p>Richard Martin, from Gas Safe Bristol, has started a Tradesmen Against Diesel Ban campaign on Facebook.</p>
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
                <h3 class="heading pl-md-5"><a href="#">Pakistan pollution: Teens fight to save Lahore from toxic air</a></h3>
              </div>
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text py-3">
                <div class="desc pl-md-5">
	                <p>Three students launch a bid to tackle Pakistan's government head-on in the fight against pollution.</p>
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
            <h1 class="mb-2 bread">Conctact us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@topollution.com</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="#">topollution.com</a></p>
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
              <h2 class="ftco-heading-2">About</h2>
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