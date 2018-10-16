@extends('welcome')    
@section('title','Home Shopper')

@section('slider')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">  

                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                         @foreach ($sliders as $slider)
                          <li data-target="#slider-carousel" data-slide-to="1"></li>
                         @endforeach
                    </ol>
             <div class="carousel-inner">   
  
                    <?php 
                        $i = 1;                         
                        foreach ($sliders as $slider){
                    ?>
                        <div class="item @if($i == 1) {{'active'}} @endif">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>{{$slider->slider_name.$i}}</h2>
                                <p>{{$slider->slider_desc}}</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset($slider->slider_image)}}" class="girl img-responsive" alt="" />
                                {{-- <img src="{{URL::to('public/images/home/pricing.png')}}"  class="pricing" alt="" /> --}}
                            </div>
                        </div>
                    <?php $i++; } ?>                     
                         
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->
@endsection

@section('main_content')

    <h2 class="title text-center">Features Items</h2>

   @foreach ($featured as $item)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img style="height:180px" src="{{asset($item->product_image)}}" alt="{{$item->product_name}}" />
                        <h2>{{$item->product_price}} Tk</h2>
                        <h2>
                         <a href="{{route('viewProduct', $item->product_id)}}">{{$item->product_name}}</a>
                        </h2>
                        <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart">
                            <i class="fa fa-eye"></i>VIEW PRODUCT</a>
                    </div>
                    {{-- <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$item->product_price}}</h2>
                            <p>{{$item->product_name}}</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                    </div> --}}
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="{{route('viewProduct', $item->product_id)}}"><i class="fa fa-eye"></i>View product</a></li>
                </ul>
            </div>
        </div>
    </div>       
   @endforeach   
    
</div><!--features_items-->

<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
            <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
            <li><a href="#kids" data-toggle="tab">Kids</a></li>
            <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tshirt" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery1.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct', $item->product_id)}}"
                                 class="btn btn-default add-to-c{{route('viewProduct',$item->product_id)}}rt">
                                 <i class="fa fa-eye"></i>VIEW PRODUCT
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery2.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery3.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery4.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="blazers" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery4.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery3.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery2.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery1.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="sunglass" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery3.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery4.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery1.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery2.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="kids" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery1.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery2.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery3.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery4.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="poloshirt" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery2.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery4.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery3.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/images/home/gallery1.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">   
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/images/home/recommend1.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/images/home/recommend2.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/images/home/recommend3.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">  
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/images/home/recommend1.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/images/home/recommend2.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/images/home/recommend3.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="{{route('viewProduct',$item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>VIEW PRODUCT</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>          
    </div>
</div><!--/recommended_items-->
@endsection