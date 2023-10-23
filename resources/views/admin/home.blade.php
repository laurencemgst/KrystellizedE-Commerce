<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
  	@include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <div class="container" align="center">
            <h3 style="padding: 20px;" class="title"> Welcome Admin, {{ $name }}! </h3>
            <div class="data-container">
              <h4>Delivered Product Data</h4>
              <div class="undelivered-data">
                <p>Placed Orders : {{ $placedorder }}</p>
              </div>
              <div class="undelivered-data" style="background-color: #F7AD19;">
                <p>Confirmed Orders : {{ $confirmedOrder }}</p>
              </div>
              <div class="undelivered-data" style="background-color: #429EBD;">
                <p>Ready to Deliver : {{ $readytopickup }}</p>
              </div>
              <div class="delivered-data">
                <p>Out for Delivery : {{ $OutforDelivery }}</p>
              </div>
              <div class="delivered-data" style="background-color: #2C599D;">
                <p> Orders Delivered : {{ $deliveredCount }}</p>
              </div>
              <div class="delivered-data" style="background-color: crimson;">
                <p> Cancelled Orders : {{ $cancelledOrder }}</p>
              </div>
            </div>
          </div>
        </div>

    @include('admin.script')
  </body>
</html>