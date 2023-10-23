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
              <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{url('OurProducts')}}">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('AboutUs')}}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('Contact')}}">Contact Us</a>
              </li>
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
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Best Beaded Products</h4>
            <h2>Grab It Now!</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    @include('user.products')

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Krystellized</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Looking for the best products?</h4>
              <p>Explore the exquisite world of krystellized our beaded jewelry collection. Each piece tells a unique story, weaving together vibrant beads to create a tapestry of beauty. From intricate bracelets, rings to statement necklaces, adorn yourself with the artistry of our beaded treasures. Crafted with passion, worn with style.</p>
              <ul class="featured-list">
                <li><a href="#">Beaded Bracelets</a></li>
                <li><a href="#">Beaded Rings</a></li>
                <li><a href="#">Beaded Necklace</a></li>
                <li><a href="#">Beaded Phone Strap</a></li>
                <li><a href="#">Customized of those?</a></li>
                <li><a href="#">Available in Krystellized</a></li>
              </ul>
              <a href="{{url('AboutUs')}}" style="background-color: pink; color: black; border: 1px solid #ccc; cursor: pointer; transition: background-color 0.3s; padding: 10px 20px; border-radius: 8%;">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div align="center" class="right-image">
              <img style="width: 300px;" src="assets/images/feature-image.jpg" alt="">
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
    <script src="admin/assets/js/closealertmessage.js"></script>


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
