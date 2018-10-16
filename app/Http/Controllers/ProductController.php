<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class ProductController extends SuperAdminController
{



    function new_product()
    {
        $data['categories'] = DB::table('tbl_category')
                                ->where('category_status',1)
                                ->orderBy('category_name','ASC')
                                ->get();
        $data['manufactures'] = DB::table('tbl_manufacture')
                                ->where('manufacture_status',1)
                                ->orderBy('manufacture_name','ASC')
                                ->get();
        return view('admin.add_product', $data);
    }

    function save_product(Request $req, $id = FALSE)
    {
        $data = array();
        $data['product_name'] = $req->product_name;
        $data['category_id'] = $req->category_id;
        $data['manufacture_id'] = $req->manufacture_id;
        $data['product_short_description'] = $req->product_short_description;
        $data['product_long_description'] = $req->product_long_description;
        $data['product_price'] = $req->product_price;
        $data['product_size'] = $req->product_size;
        $data['product_color'] = $req->product_color;
        $data['product_status'] = $req->product_status;

        $image = $req->file('product_image');

        if($image)
        {
            $image_name = str_random(20);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $new_file = $image_name.".".$image_ext;
            $upload_path = 'public/product-image/';
            $image_url = $upload_path.$new_file; 

            $image->move($upload_path, $new_file);

            if($id != FALSE)
            {
                $p_img = DB::table('tbl_products')
                         ->where('product_id',$id)
                         ->first(); 

                 if($p_img->product_image != "")
                 {
                    unlink($p_img->product_image);
                 }          

            }

            $data['product_image'] = $image_url;

        }
        else
        {
          if($id == FALSE)
          {
            $data['product_image'] = "";
          }
          else
          {
                      
            $p_img = DB::table('tbl_products')
            ->where('product_id',$id)
            ->first();            

            $data['product_image'] = $p_img->product_image;
          } 
        }

        // echo "<pre>";
        // print_r($data);
        // die;


        if($id == FALSE)
        {
            $insert = DB::table('tbl_products')->insertGetId($data);
            $tute = "inserted";
        }
        else
        {
            $insert = DB::table('tbl_products')->where('product_id', $id)->update($data);
            $tute = "Updated";
            $insert = $id;
        }

 
           
        if($insert)
        {
             $msg = "<span class='text text-success'>Product ".$tute." successfully</span>";
             Session::put('msg', $msg);
             return Redirect::to('/edit-product'.'/'.$insert);
        }
        else
        {
             $msg = "<span class='text text-danger'>Error!! Product not ".$tute."!</span>";
             Session::put('msg', $msg);
                if($id != FALSE){
                    $insert = $id;
                }
             return Redirect::to('/edit-product'.'/'.$insert);          
        }



    }

    function all_products()
    {
         $data['products'] = DB::table('tbl_products')
                                ->join('tbl_category','tbl_products.category_id','tbl_category.category_id')
                                ->join('tbl_manufacture','tbl_products.manufacture_id','tbl_manufacture.manufacture_id') 
                                ->orderBy('product_id','DESC')
                                ->get();
         return view('admin/all_products', $data);
    }

    function active_product($id)
    {
        DB::table('tbl_products')
        ->where('product_id', $id)
        ->update(['product_status' => 1]);
        return Redirect('/all-products');
    }

    function inactive_product($id)
    {
        DB::table('tbl_products')
        ->where('product_id', $id)
        ->update(['product_status' => 0]);
        return Redirect('/all-products');
    }

    function edit_product($id)
    { 
         $data['categories'] = DB::table('tbl_category')->where('category_status',1)->get();
         $data['manufactures'] = DB::table('tbl_manufacture')->where('manufacture_status',1)->get();
         $data['product'] = DB::table('tbl_products')->where('product_id', $id)->first();
         return view('admin/edit_product', $data);
    }


    function delete_product($id)
    {
        $p_img = DB::table('tbl_products')
        ->where('product_id',$id)
        ->first(); 

        if($p_img->product_image != "")
        {
        unlink($p_img->product_image);
        }       
        
        DB::table('tbl_products')->where('product_id',$id)->delete();

        $msg = "<span class='text text-successfully'>Product Deleted Successfully!</span>";
        Session::put('msg', $msg);
           if($id != FALSE){
               $insert = $id;
           }
        return Redirect::to('/all-products');  

    }





}
