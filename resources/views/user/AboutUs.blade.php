<!DOCTYPE html>
<html lang="en">

  <head>
  	@include('user.head')
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{url('/')}}"><h2>Krys<em>tellized</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{url('OurProducts')}}">Our Products</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{url('AboutUs')}}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('Contact')}}">Contact Us</a>
              </li>
              <li class="nav-link">
                @if (Route::has('login'))
                  @auth
                    <li class="nav-item">
                      <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-user"></i></button>
                        <div id="myDropdown" class="dropdown-content">
                          <a href="{{url('showCart')}}"> <i class="fa-solid fa-cart-shopping"></i> Cart[{{$count}}]</a>
                          <a href="{{url('TrackOrder')}}">Track Order</a>
                        </div>
                      </div>
                    </li>
                    <x-app-layout></x-app-layout>
                  @else
                    <li> <a class="nav-link" href="{{ route('login') }}">Log in</a> </li>
                    @if (Route::has('register'))
                      <li> <a class="nav-link" href="{{ route('register') }}">Register</a> </li>
                    @endif
                  @endauth
                @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>
      @if(session()->has('message'))
        <div class="alert alert-success" id="alert-message">
          <button type="button" class="close" data-dismiss="alert"> x </button>
          {{session()->get('message')}}
        </div>
      @endif
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>about us</h4>
              <h2>Krystellized</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Background</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Who we are &amp; What we do?</h4>
              <p>At Krystellized, we are passionate artisans dedicated to crafting exquisite beaded jewelry that transcends mere accessories and becomes wearable art. Our brand is a celebration of creativity, individuality, and the vibrant stories that can be woven with beads. We take pride in handcrafting each piece, infusing it with the essence of our artistic vision and the uniqueness of the materials we use. From intricate bracelets that delicately grace your wrists to statement necklaces that demand attention, Krystellized offers an array of beaded treasures that allow you to adorn yourself with the artistry of our creations. What we do is transform beads into tales of beauty, passion, and style, giving you the opportunity to express your personality and individuality through our jewelry. We invite you to explore our collection and let our beaded jewelry become a part of your own unique story.</p>
              <ul class="social-icons">
                <li><a href="https://www.facebook.com/profile.php?id=100089140057895"><i class="fa fa-facebook"></i></a>
                <li><a href="https://www.instagram.com/_krystellized/"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Team Members</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/Andrea.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Andrea Krystel Estadilla</h4>
                <span>Founder</span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/Laurence.jpeg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Laurence Magistrado</h4>
                <span>CO-Founder</span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/Rodney.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Rodney Celetaria</h4>
                <span>CO-Founder</span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/CJ.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Carlo James Ballerda</h4>
                <span>CO-Founder</span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/Marri.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Marri Grace Morata</h4>
                <span>CO-Founder</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    @include('user.footer')


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
    @include('user.dropdownscript')


  </body>

</html>