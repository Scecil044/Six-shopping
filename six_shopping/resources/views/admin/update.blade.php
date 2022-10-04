<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <base href="/public">
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
    <style type="text/css">
        item-list{
            padding-top:100px;
        }
        label{
            width:200px;
            display:inline-block;
        }
        input[type="text"],
        input[type="number"]{
            color:#000;
        }
       .save{
        width:100%;
       }
       .container h2{
        size:20px;
        text-transform:uppercase;
        display:block;
        margin:auto;
       }
       .product{
        width:30%;
        height:30%;
       }
    </style>
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
        
        <!-- partial:partials/_navbar.html -->
       @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container">
                <div class="item-list">
                    <h2>Update Products</h2>
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                    </div>
                    @endif
                    <form action="{{url('update_product', $record->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="row">
                            <div class="col-md-9">
                            <div style="padding:10px;">
                            <label>Title</label>
                            <input type="text" name="title" value="{{$record->title}}" required>
                        </div>

                        <div style="padding:10px;">
                            <label>Description</label>
                           <input type="text" value="{{$record->description}}" required name="description">
                        </div>

                        <div style="padding:10px;">
                            <label>Quantity</label>
                            <input type="number" name="quantity" min="1" required value="{{$record->quantity}}">
                        </div>

                        <div style="padding:10px;">
                        <label>current image</label>
                            <img src="productImages/{{$record->image}}" class="product">
                        </div>

                        <div style="padding:10px;">
                            <label>Image</label>
                            <input type="file" name="file">
                        </div>

                        <div style="padding:10px;">
                            <label>Price</label>
                            <input type="number" name="price" value="{{$record->price}}" required>
                        </div>

                        <div style="padding:10px;">
                            <input type="submit" value="submit" class="btn btn-success save">
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
  </body>
</html>