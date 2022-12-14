<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('admin.navbar')
        
       <div class="container-fluid page-body-wrapper" style="width:100%;">
            <div class="container">
                <table >
                    <tr style="background-color:gray">
                        <td style="padding:20px;">Name</td>
                        <td style="padding:20px;">Address</td>
                        <!-- <td>email</td> -->
                        <td style="padding:15px;">Phone</td>
                        <td style="padding:15px;">Title</td>
                        <td style="padding:15px;">Description</td>
                        <td style="padding:15px;">Quantity</td>
                        <td style="padding:15px;">Price</td>
                        <td style="padding:15px;">Status</td>
                        <td style="padding:15px;">Action</td>
                    </tr>
                    @foreach($orders as $result)
                    <tr>
                        <td>{{$result->name}}</td>
                        <td>{{$result->address}}</td>
                        <!-- <td>{{$result->email}}</td> -->
                        <td>{{$result->phone}}</td>
                        <td>{{$result->title}}</td>
                        <td>{{$result->description}}</td>
                        <td>{{$result->quantity}}</td>
                        <td>{{$result->price}}</td>
                        <td>{{$result->status}}</td>
                        <td><a href="" class="btn btn-danger">Cancel</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @include('admin.scripts')
  </body>
</html>