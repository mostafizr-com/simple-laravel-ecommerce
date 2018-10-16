@extends('welcome')    
@section('title','Home Shopper')

@section('main_content')

<style>
.has-error {
    border: 1px solid #ff09004d !important;
    box-shadow: 0px 0px 11px -3px red;
}
</style>
    <div class="container col-sm-12">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <?php
                      if (Session::get('msg')) {
                          echo Session::get('msg');
                      }
                    ?>
                    <form action="{{ route('customerAuth') }}" method="post">
                        @csrf
                        <input type="email" name="customer_email" placeholder="Email" />
                        <input type="password" name="password" placeholder="Password" />
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{route('clreateCustomer')}}" method="post" class="form-group">
                        @csrf
                        <input type="text" name="customer_name" placeholder="Name" 
                        class="{{ $errors->has('customer_name') ? 'has-error' : ''}}"/>
                        {!! $errors->first('customer_name', '<p class="text text-danger">:message</p>') !!}

                        <input type="email" name="customer_email" placeholder="Email Address" 
                        class="{{ $errors->has('customer_name') ? 'has-error' : ''}}"/>
                        {!! $errors->first('customer_email', '<p class="text text-danger">:message</p>') !!}

                        <input type="number" name="customer_phone" placeholder="Mobile Number"
                        class="{{ $errors->has('customer_phone') ? 'has-error' : ''}}"/> 
                        {!! $errors->first('customer_phone', '<p class="text text-danger">:message</p>') !!}

                        <input type="password" name="password" placeholder="Password" 
                        class="{{ $errors->has('password') ? 'has-error' : ''}}"/>
                        {!! $errors->first('password', '<p class="text text-danger">:message</p>') !!}

                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
    
@endsection