@extends('welcome')
@section('main_content')
<?php
  $contents = Cart::getContent();
?>
<section id="cart_items">

    <div class="container col-sm-12">

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
	<div class="container col-sm-8">

		<div class="paymentCont">
            <div class="headingWrap">
                    <h3 class="headingTop text-center">Select Your Payment Method</h3>	
                    <p class="text-center">Created with bootsrap button and using radio button</p>
            </div>
        <form action="{{route('orderPlace')}}" method="post">
            @csrf
            <div class="paymentWrap">
                <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">

                    <label class="btn paymentMethod active" title="Payment on Delivery">
                        <div class="method visa"></div>
                        <input type="radio" value="handcash" name="payment_getway" checked> 
                    </label>
                    <label class="btn paymentMethod" title="Payment via Debit Card">
                        <div class="method master-card"></div>
                        <input type="radio" value="card" name="payment_getway"> 
                    </label>
                    {{-- <label class="btn paymentMethod" title="Payment via Payza">
                        <div class="method amex"></div>
                        <input type="radio" value="payza" name="payment_getway">
                    </label> --}}
                     <label class="btn paymentMethod" title="Payment via Bkash">
                         <div class="method vishwa"></div>
                        <input type="radio" value="bkash" name="payment_getway"> 
                    </label>

                </div> 
                <br><br>
                <button type="submit" class="btn btn-success pull-right btn-fyi">
                    Proceed to payment <span class="glyphicon glyphicon-chevron-right"></span>
                </button>       
            </div>
         </form>
            {{-- <div class="footerNavWrap clearfix">
                <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> CONTINUE SHOPPING</div>
                <div class="btn btn-success pull-right btn-fyi">CHECKOUT<span class="glyphicon glyphicon-chevron-right"></span></div>
            </div> --}}
        </div>
	</div>
</section><!--/#do_action-->
<div class="clear-fix"></div>
 @endsection