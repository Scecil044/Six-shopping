<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   
<!--


TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style style="text/css">
      .cart{
        width:100%;
      }
    </style>
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


   
    <!-- Page Content -->
    <!-- Banner Starts Here -->
   
      
        <div class="conntainer">
        @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('message')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                    </div>
                    @endif
        <table style="width:100%;">
        <tr style="padding:20px; background-color:#000;color:#fff;">
            <td>Product Title</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Image</td>
            <td>Delivery address</td>
            <td>Cancel</td>
        </tr>
        
        @foreach($orders as $order)
        <form action="{{url('confirmed_orders', $order->id)}}" method="POST">
            @csrf
        <tr style="background-color:#eee;">
            <td>
                <input type="hidden" value="{{$order->title}}" name="title[]">
                {{$order->title}}
            </td>
            <td>
            <input type="hidden" value="{{$order->description}}" name="description[]">
                {{$order->description}}
            </td>
            <td>
            <input type="hidden" value="{{$order->quantity}}" name="quantity[]">
                {{$order->quantity}}
            </td>
            <td>
            <input type="hidden" value="{{$order->price}}" name="price[]">
                {{$order->price}}
            </td>
            <td><img src="productImages/{{$order->image}}" style="height:100px;width:100px;"></td>
            <td>
            <input type="hidden" value="{{$order->address}}" name="address[]">
                {{$order->address}}
            </td>
            <td> <a href="{{url('cancel_order', $order->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to cancel this order?')">Cancel</a></td>
        </tr>
        @endforeach
      </table>
      <input type="submit" value="Checkout" class="btn btn-success btn-lg checkout" style="display:block; margin:auto;">
      </form>
        </div>
    





    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


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


  </body>

</html>
