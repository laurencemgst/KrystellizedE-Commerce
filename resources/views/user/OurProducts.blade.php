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
    @include('user.header')

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Krystellized Products</h2>
              <form action="{{url('search')}}" method="get" class="form-inline" style="float: right;">
                @csrf
                <input class="form-control" type="search" name="search" placeholder="Search">
                <input type="submit" value="Search" class="btn btn-light">
              </form>
            </div>
          </div>

          @foreach($data as $product)
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img height="310" width="200" src="/productimage/{{$product->image}}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>₱{{$product->price}}</h6>
                <p>{{$product->description}}</p>

                <form action="{{url('addtocart', $product->id)}}" method="POST">
                  @csrf
                  <input type="number" value="1" min="1" class="form-control" style="width:100px" name="quantity">
                  <br>
                  <input type="submit" value="Add to Cart" style="background-color: pink; color: black; border: 1px solid #ccc; cursor: pointer; transition: background-color 0.3s; padding: 10px 20px; border-radius: 8%;">
                </form>

              </div>
            </div>
          </div>
          @endforeach
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
