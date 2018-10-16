<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Redirect;

class CartController extends Controller
{
    function view_cart()
    {
        return view('pages/cart');
    }

    function add_to_cart(Request $req)
    {

        $product_id = $req->product_id;

        $product_quantity = $req->product_quantity;

        $data['product'] = DB::table('tbl_products')
                            ->where('product_id',$product_id)
                            ->first(); 

        $data['id'] = $data['product']->product_id;
        $data['name'] = $data['product']->product_name;
        $data['price'] = $data['product']->product_price;
        $data['quantity'] =  $product_quantity;
        // $data['conditions'] = $saleCondition ;
        $data['attributes']['image'] = $data['product']->product_image;
        $data['attributes']['size'] = $data['product']->product_size;
        $data['attributes']['color'] = $data['product']->product_size;

        $condition1 = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT10.5%',
            'type' => 'tax',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '5.0%',
        ));


        Cart::condition($condition1);

        Cart::add($data);

        return Redirect::route('showCart');

        // return view('pages/cart', $data);                  
    }

    function show_cart()
    {


        $data['category'] = DB::table('tbl_category')
                        ->where('category_status',1)
                        ->get();

        $data['brand'] = DB::table('tbl_manufacture')
                    ->where('manufacture_status',1)
                    ->get();      
                           
                        
        return view('pages/cart', $data);
    }

    function remove_cart_item($id)
    {
        Cart::remove($id);
        return Redirect::route('showCart');
    }

    function update_cart_item(Request $req)
    { 
        $product_id = $req->product_id;
        $quantity = $req->quantity;

        if($quantity > 0)
        {
            Cart::update($product_id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity
                ),
            ));
        }
        else
        {
            Cart::remove($product_id); 
        }


        return Redirect::route('showCart');
    }

}
