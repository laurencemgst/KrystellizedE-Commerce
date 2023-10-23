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
              <li class="nav-item">
                <a class="nav-link" href="{{url('AboutUs')}}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('Contact')}}">Contact Us</a>
              </li>
              <li class="nav-link">
                @if (Route::has('login'))
                  @auth
                    <li class="nav-item active">
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
    <div style="padding: 100px;" align="center">
      <table>
        <tr style="background-color: black;">
          <td style="padding: 10px; color: white; font-size: 20px;">PRODUCT NAME</td>
          <td style="padding: 10px; color: white; font-size: 20px;">QUANTITY</td>
          <td style="padding: 10px; color: white; font-size: 20px;">PRICE</td>
          <td style="padding: 10px; color: white; font-size: 20px;">ACTION</td>
        </tr>

        <form action="{{url('orderconfirmed')}}" method="post">
          @csrf
          @foreach($cart as $carts)
          <tr style="background-color: grey;">
            <td style="padding: 10px; color:white;">
              <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden="">
              {{$carts->product_title}}</td>
            <td style="padding: 10px; color:white;">
              <input type="text" name="quantity[]" value="{{$carts->product_quantity}}" hidden="">
              {{$carts->product_quantity}}</td>
            <td style="padding: 10px; color:white;">
              <input type="text" name="price[]" value="{{$carts->product_price}}" hidden="">
              ₱{{$carts->product_price}}</td>
            <td style="padding: 10px; color:white;"><a class="btn btn-danger" href="{{url('delete', $carts->id)}}"> Delete</a></td>
          </tr>
          @endforeach
          <tr style="background-color: white;">
              <td colspan="4">&nbsp;</td>
          </tr>
          <tr style="background-color: grey;">
            <td style="padding: 10px; color:white;">Total:</td>
            <td style="padding: 10px; color:white;"> </td>
            <td style="padding: 10px; color:white;">₱{{$total}}</td>
            <td style="padding: 10px; color:white;"> </td>
          </tr>
      </table>
      <div style="padding-top: 10px;">
        
        <button class="btn btn-success">Place Order</button>
      </div>
      </form>
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
