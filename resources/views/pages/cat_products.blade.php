@extends('welcome')    
@section('title','Home Shopper')

@section('main_content')
    <h2 class="title text-center">Items by Category</h2>

   @foreach ($products as $item)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img style="height:180px" src="{{asset($item->product_image)}}" alt="{{$item->product_name}}" />
                        <h2>{{$item->product_price}} Tk</h2>
                        <p>{{$item->product_name}}</p>
                        <a href="{{route('viewProduct', $item->product_id)}}" 
                            class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>Add to cart
                        </a>
                    </div>
                    {{-- <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$item->product_price}} Tk</h2>
                            <p>{{$item->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div> --}}
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="{{route('viewProduct', $item->product_id)}}">
                        <i class="fa fa-eye"></i>View product
                    </a></li>
                </ul>
            </div>
        </div>
    </div>       
   @endforeach   
    
</div><!--features_items-->


@endsection