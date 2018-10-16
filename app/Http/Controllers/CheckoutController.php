<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
use Cart;

class CheckoutController extends Controller
{
    //

    function cust_login(Request $req)
    {
        if(Session::get('customer_id'))
        {
            return Redirect::route('checkout');
        }
        else
        {
            return view('pages/cust_login');
        }

    }

    function create_customer(Request $req)
    {
        $req->validate(array(
            'customer_name' => 'required',
            'customer_email' => 'required|email|unique:tbl_customers,customer_email',
            'customer_phone' => 'required',
            'password' => 'required|min:3'
        ));
         $data['customer_name'] = $req->customer_name;
         $data['customer_email'] = $req->customer_email;
         $data['customer_phone'] = $req->customer_phone;
         $data['password'] = md5($req->password);

         $cust_id = DB::table('tbl_customers')
                     ->insertGetId( $data );

         Session::put('customer_id', $cust_id);
         Session::put('customer_name', $data['customer_name']);

         return Redirect::route('checkout');

    }

    function save_shipping_data(Request $req)
    {
         $data['shipping_email']       = $req->shipping_email;
         $data['shipping_first_name']  = $req->shipping_first_name;
         $data['shipping_last_name']   = $req->shipping_last_name;
         $data['shipping_address1']    = $req->shipping_address1;
         $data['shipping_address2']    = $req->shipping_address2;
         $data['shipping_city']        = $req->shipping_city;                 
         $data['shipping_phone']       = $req->shipping_phone;

         $inserted_id = DB::table('tbl_shipping')
                                      ->insertGetId($data); 

        Session::put('shipping_id', $inserted_id);  
        return Redirect::route('paymentMethod');                            
    }
    

    function login_auth(Request $req)
    {
         $email = $req->customer_email;
         $pwd = md5($req->password);

         $customer = DB::table('tbl_customers')
                          ->where('customer_email', $email)
                          ->where('password', $pwd)
                          ->first();
         if($customer)
         {
             Session::put('customer_id', $customer->customer_id);
             Session::put('customer_email', $customer->customer_email);
             Session::put('customer_name', $customer->customer_name);

             return Redirect::route('checkout');
         }                
         else
         {
             $msg = '<p class="text text-danger">
                       Incorrect Email or Password. Please try again.</p>';
             Session::put('msg', $msg);
             return Redirect::route('custLogin');
         }
    }

    function view_checkout()
    {
        if(Session::get('shipping_id'))
        {
            return Redirect::route('paymentMethod');
        }
        else
        {
            return view('pages/checkout');
        }
    }

    function payment_method()
    {
        return view('pages/payment_method');
    }   

    function place_order(Request $req)
    {
         $data = array();

         $data['payment_method'] = $req->payment_getway;
         $data['payment_status'] = "pending";

         $payment_id = DB::table('tbl_payment')
                            ->insertGetId($data);
         
         $data = array();
         $data['customer_id'] =  Session::get('customer_id'); 
         $data['shipping_id'] =  Session::get('shipping_id');
         $data['payment_id']  =  $payment_id;
         $data['order_total'] =  Cart::getTotal();
         $data['order_status'] = "pending";

         $order_id = DB::table('tbl_order')
                          ->insertGetId($data);

         $contents = Cart::getContent();     
         $data = array();

         foreach($contents as $item)
         {
            $data['order_id'] =  $order_id;
            $data['product_id'] = $item->id;
            $data['product_name'] = $item->name;
            $data['product_price'] = $item->price;
            $data['product_sales_quantity'] = $item->quantity;

             DB::table('tbl_order_detailes')->insert($data);
         }

         if($req->payment_getway == 'handcash')
         {
            echo 'Order successfully done by handcash. we will call you soon for confirmation. Thank you';
         }
         elseif($getway == 'card')
         {
            echo 'debit card';
         }

         elseif($getway == 'bkash')
         {
            echo 'bkash';
         }          
    }

    function cust_logout(Request $req)
    {

        $req->session()->flush();
    
        $req->session()->regenerate();
    
        return redirect('/');
    }
}
