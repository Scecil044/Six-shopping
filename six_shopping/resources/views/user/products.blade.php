<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
              <form action="{{url('search')}}" method="get" class="form-inline" style="float:right;padding:10px;">
              @csrf
              <input type="search" name="search" class="form-control" placeholder="Search....">
              <input type="submit" value="search" class="btn btn-success">
              </form>
            </div>
          </div>
        @foreach($data as $item)
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="productImages/{{$item->image}}" style="height:300px;"></a>
              <div class="down-content">
                <a href="#"><h4>{{$item->title}}</h4></a>
                <h6>${{$item->price}}</h6>
                <p>{{$item->description}}</p>
                <form action="{{url('cart', $item->id)}}" method="POST">
                  @csrf
                  <input type="number" min="1" class="form-control" style="sidth:100px;">
                  <br>
                <input type="submit" value="Add to Cart" class="btn btn-danger cart">
                </form>
                <!-- <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews (32)</span> -->
              </div>
            </div>
          </div>
        @endforeach
        @if(method_exists($data, 'links'))
          <div class="d-flex justify-content-center">
            {!! $data->links()!!}
          </div>
        @endif
      
        </div>
      </div>
    </div>
  