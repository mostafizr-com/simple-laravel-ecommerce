@extends('welcome')    
@section('title','Cart - Home Shopper')
@section('main_content')
    <h2 class="title text-center">Cart</h2>
    <?php
      $contents = Cart::getContent();
    ?>
	<section id="cart_items">
            <div class="container col-sm-12">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                      <li><a href="#">Home</a></li>
                      <li class="active">Shopping Cart</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Image</td>
                                <td class="description">Name</td>
                                <td class="price">Price (Tk)</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total Price (Tk)</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>  
                           @if(!Cart::isEmpty())
                            @foreach ($contents as $item)
                         
                            <tr>
                                <td class="cart_product">
                                    <a href="">
                                        <img src="{{asset($item->attributes->image)}}" alt=""
                                        style="height:50px; width:50px; border:1px solid #D4D4D4; padding:3px;">
                                    </a>
                                </td>

                                <td class="cart_price">
                                    <p><a href="{{route('viewProduct',$item->id)}}">
                                        {{$item->name}}</a>
                                    </p>
                                    {{-- <p>Web ID: 1089772</p> --}}
                                </td>

                                <td class="cart_price">
                                    <p>{{$item->price}} Tk</p>
                                </td>

                                <td class="cart_quantity" width="">
                                    <div class="cart_quantity_button">
                                    <form action="{{route('UpdateItem')}}" method="POST">  
                                        @csrf  
                                        <input type="hidden" name="product_id" value="{{$item->id}}">
                                        <input type="number" name="quantity" class="form-control"
                                         style="width:50px;height:31px; padding:5px; float:left;" 
                                        value="{{$item->quantity}}" autocomplete="off" size="2">

                                        <button style="margin-left:10px !important" type="submit" class="btn btn-sm btn-default"> Update </button>      
                                    </form> 
                                    </div>
                                </td>
                                
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                      {{$item->getPriceSum()}} /=
                                    </p>
                                </td>

                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{route('RemoveItem',$item->id)}}">
                                        <i class="fa fa-times"></i></a>
                                </td>
                            </tr>

                            @endforeach 
                          @else
                          <tr>
                            <td>
                                <h2> Your cart is empty...</h2>
                            </td>
                          </tr> 
                          @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </section> <!--/#cart_items-->
    
        <section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>What would you like to do next?</h3>
                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                </div>

              @if (!Cart::isEmpty())
    
                <div class="row">

                    <?php

                    $total = Cart::getTotal();
                    $subTotal = Cart::getSubTotal();
                    $condition = Cart::getCondition('VAT10.5%');
                    // $shipping = Cart::getCondition('shipping');
                    $echo_tax = $condition->getCalculatedValue($subTotal);
                    $shipping = "50";
                    ?>
                    <div class="col-sm-8">
                        <div class="total_area">
                            <ul>
                                <li>Cart Sub Total <span>{{ $subTotal }} Tk</span></li>
                                <li>Eco Tax <span>{{ $condition->getValue() }} = {{ $echo_tax }} Tk</span></li>
                                <li>Shipping Cost <span>{{$shipping}} Tk</span></li>
                                <li>Total <span>{{ $total+$shipping }} Tk</span></li>
                            </ul>
                                <a class="btn btn-default update" href="">Update</a>
                                <a class="btn btn-default check_out" href="{{route('custLogin')}}">Check Out</a>
                        </div>
                    </div>
                </div>
                
            @endif

            </div>
        </section><!--/#do_action-->
    
@endsection