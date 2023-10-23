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
    <div class="" style="padding-top: 100px;" align="center">
      <h1 style="font-size: 20px; padding-bottom: 10px;"> Track Your Orders </h1>
      <div class="" align="center">
        <table>
          <tr style="background-color: gray; border: 1px solid;">
            <td style="padding:10px;">DATE PURCHASED</td>
            <td style="padding:10px;">ORDER NUMBER</td>
            <td style="padding:10px;">PRODUCT NAME</td>
            <td style="padding:10px;">PRICE</td>
            <td style="padding:10px;">QUANTITY</td>
            <td style="padding:10px;">STATUS</td>
          </tr>

          @foreach($order as $orders)
          <tr align="center" style="border: 1px solid;">
            <td style="padding:5px; font-size: 15px">{{$orders->created_at}}</td>
            <td style="padding:5px; font-size: 15px">{{$orders->orderNumber}}</td>
            <td style="padding:5px; font-size: 15px">{{$orders->product_name}}</td>
            <td style="padding:5px; font-size: 15px">{{$orders->price}}</td>
            <td style="padding:5px; font-size: 15px">{{$orders->quantity}}</td>
            <td style="padding:5px; font-size: 15px; color: pink; background-color: black;">{{$orders->status}}</td>
            <td style="padding:25px;">
              @if($orders->status === 'Cancelled Order')
                <span>Cancelled</span>
              @elseif($orders->status === 'Order is Successfully Delivered')
                <span>Delivered</span>
              @elseif($orders->status === 'Order is ready to pickup by rider' || $orders->status === 'Order is Out for Delivery')
                <span>Proccessed</span>
              @else
                <a class="btn btn-success" href="{{url('requestCancel', $orders->id)}}">Cancel</a>
              @endif
            </td>
          </tr>
          @endforeach
        </table>
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
