<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
  	 <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="{{url('/')}}"><img src="admin/assets/images/Krystellized.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Krystellized</h5>
                  <span>Administrator</span>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('redirect')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('product')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Add New Products</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('showproduct')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Show All Products</span>
            </a>
          </li>
          <li class="nav-item menu-items active">
            <a class="nav-link" href="{{url('showorder')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Show All Orders</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="" style="padding-top: 80px;">
          <div class="" align="center">
            @if(session()->has('error'))
              <div class="alert alert-danger" id="alert-message">
                <button type="button" class="close" data-dismiss="alert"> x </button>
                {{session()->get('error')}}
              </div>
            @endif
            <table>
              <tr style="background-color: gray; ">
                <td style="padding:5px;">ORDER NUMBER</td>
                <td style="padding:5px;">CUSTOMER NAME</td>
                <td style="padding:5px;">PHONE</td>
                <td style="padding:5px;">ADDRESS</td>
                <td style="padding:5px;">PRODUCT NAME</td>
                <td style="padding:5px;">PRICE</td>
                <td style="padding:5px;">QUANTITY</td>
                <td style="padding:5px;">STATUS</td>
                <td style="padding:5px;">ACTION</td>
              </tr>

              @foreach($order as $orders)
              <tr align="center" style="background-color: black;">
                <td style="padding:5px; font-size: 12px">{{$orders->orderNumber}}</td>
                <td style="padding:5px; font-size: 12px">{{$orders->name}}</td>
                <td style="padding:5px; font-size: 12px">{{$orders->phone}}</td>
                <td style="padding:5px; font-size: 12px">{{$orders->address}}</td>
                <td style="padding:5px; font-size: 12px">{{$orders->product_name}}</td>
                <td style="padding:5px; font-size: 12px">{{$orders->price}}</td>
                <td style="padding:5px; font-size: 12px">{{$orders->quantity}}</td>
                <td style="padding:5px; font-size: 12px">{{$orders->status}}</td>
                <td>
                  <form method="post" action="{{ url('updatestatus', $orders->id) }}">
                      @csrf
                      <select style="color: black;" name="status" id="status" onchange="this.form.submit()">
                          @if ($orders->status === "Request to Cancel my Order")
                              <option style="color: black;" selected>Request to Cancel Order</option>
                              <option style="color: black;" value="Cancelled Order">Cancel The Order</option>
                          @else
                              <option style="color: black;" value="Order is Placed" {{ $orders->status === "Order is Placed" ? 'selected' : '' }}>Order is Placed</option>
                              <option style="color: black;" value="Order is Confirmed" {{ $orders->status === "Order is Confirmed" ? 'selected' : '' }}>Order is Confirmed</option>
                              <option style="color: black;" value="Order is ready to pickup by rider" {{ $orders->status === "Order is ready to pickup by rider" ? 'selected' : '' }}>Order is ready to pickup by rider</option>
                              <option style="color: black;" value="Order is Out for Delivery" {{ $orders->status === "Order is Out for Delivery" ? 'selected' : '' }}>Order is Out for Delivery</option>
                              <option style="color: black;" value="Order is Successfully Delivered" {{ $orders->status === "Order is Successfully Delivered" ? 'selected' : '' }}>Order is Successfully Delivered</option>
                              <option style="color: black;" {{ $orders->status === "Cancelled Order" ? 'selected' : '' }} hidden>Candelled</option>
                          @endif
                      </select>
                  </form>
                </td>

              </tr>
              @endforeach
            </table>
          </div>
        </div>

    @include('admin.script')
  </body>
</html>