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
              <li class="nav-item active">
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