@extends('welcome')    
@section('title','Home Shopper')

@section('main_content')
<section id="cart_items">
<div class="container col-sm-12">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Check out</li>
        </ol>
    </div><!--/breadcrums-->

    <div class="step-one">
        <h2 class="heading">Step1</h2>
    </div>
    <div class="checkout-options">
        <h3>New User</h3>
        <p>Checkout options</p>
        <ul class="nav">
            <li>
                <label><input type="checkbox"> Register Account</label>
            </li>
            <li>
                <label><input type="checkbox"> Guest Checkout</label>
            </li>
            <li>
                <a href=""><i class="fa fa-times"></i>Cancel</a>
            </li>
        </ul>
    </div><!--/checkout-options-->

    <div class="register-req">
        <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
    </div><!--/register-req-->

    <div class="shopper-informations">
        <div class="row">

            <div class="col-sm-12 clearfix">
                <div class="bill-to">
                    <p>Billing Address</p>
                    <div class="form-one">
                        <form action="{{route('saveShipping')}}" method="post">
                            @csrf
                            <input type="email" name="shipping_email" placeholder="Email*">
                            <input type="text" name="shipping_first_name" placeholder="First Name *">
                            <input type="text" name="shipping_last_name" placeholder="Last Name *">
                            <input type="text" name="shipping_address1" placeholder="Address 1 *">
                            <input type="text" name="shipping_address2" placeholder="Address 2">
                            <input type="text" name="shipping_city" placeholder="City *">                            
                            <input type="number" name="shipping_phone" placeholder="Phone Number *">
                            <input type="submit" class="btn btn-primary" value="Continue">
                        </form>
                    </div>
                </div>
            </div>
					
        </div>
    </div>
    <div class="review-payment">
        <h2>Review & Payment</h2>
    </div>
    <br>
    <div class="payment-options">
            <span>
                <label><input type="checkbox"> Direct Bank Transfer</label>
            </span>
            <span>
                <label><input type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input type="checkbox"> Paypal</label>
            </span>
        </div>
</div>
</section> <!--/#cart_items-->
    
@endsection