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
          <li class="nav-item menu-items active">
            <a class="nav-link" href="{{url('showproduct')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Show All Products</span>
            </a>
          </li>
          <li class="nav-item menu-items">
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
        <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper">
          <div class="container" align="center">
            @if(session()->has('message'))
              <div class="alert alert-success" id="alert-message">
                <button type="button" class="close" data-dismiss="alert"> x </button>
                {{session()->get('message')}}
              </div>
            @endif
            <table>
              <tr style="background-color: gray;">
                <td style="padding: 30px;">Name</td>
                <td style="padding: 30px;">Description</td>
                <td style="padding: 30px;">Quantity</td>
                <td style="padding: 30px;">Price</td>
                <td style="padding: 30px;">Image</td>
                <td style="padding: 30px;">Update</td>
                <td style="padding: 30px;">Delete</td>
              </tr>
              @foreach($data as $product)
              <tr align="center" style="background-color: black;">
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                <td><img style="width: 150px;" src=/productimage/{{$product->image}}></td>
                <td> <a class="btn btn-primary" href="{{url('updateproductview', $product->id)}}">Update</a></td>
                <td> <a class="btn btn-danger" href="javascript:void(0);" onclick="confirmDelete('{{url('deleteproduct', $product->id)}}')">Delete</a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>

    @include('admin.script')
    <script>
    function confirmDelete(deleteUrl) {
      if (window.confirm("Are you sure you want to delete this item?")) {
        // If the user confirms, redirect to the delete URL
        window.location.href = deleteUrl;
      }
    }
    </script>
  </body>
</html>