<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
      .title
      {
        color:white;
        padding-top: 25px;
        font-size: 25px;
      }
      label
      {
        display: inline-block;
        width: 200px;
      }
    </style>
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
          <li class="nav-item menu-items active">
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
        <div class="container-fluid page-body-wrapper">
          <div class="container" align="center">
            <h3 class="title"> Add Product </h3>

            @if(session()->has('message'))
              <div class="alert alert-success" id="alert-message">
                <button type="button" class="close" data-dismiss="alert"> x </button>
                {{session()->get('message')}}
              </div>
            @endif

            <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div style="padding: 15px;">
                <label> Product Name </label>
                <input style="color: black;" type="text" name="title" placeholder="Give a product name" required="">
              </div>

              <div style="padding: 15px;">
                <label> Price </label>
                <input style="color: black;" type="text" name="price" placeholder="Give a price" required="">
              </div>

              <div style="padding: 15px;">
                <label> Product Description </label>
                <input style="color: black;" type="text" name="des" placeholder="Give a product Description" required="">
              </div>

              <div style="padding: 15px;">
                <label> Quantity </label>
                <input style="color: black;" type="text" name="quantity" placeholder="Give a product quantity" required="">
              </div>

              <div style="padding: 15px;">
                <input type="file" name="file">
              </div>

              <div style="padding: 15px;">
                <input class="btn btn-success" type="submit">
              </div>
            </from>
          </div>
        </div>

    @include('admin.script')
  </body>
</html>