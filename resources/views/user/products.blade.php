    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="{{url('OurProducts')}}">view all products <i class="fa fa-angle-right"></i></a>
              <form action="{{url('search')}}" method="get" class="form-inline" style="float: right; padding: 10px;">
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

          @if(method_exists($data, 'links'))
          <div class="d-flex justify-content-end">
            {{$data->links()}}
          </div>
          @endif
        </div>
      </div>
    </div>