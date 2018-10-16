<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PublicPagesController extends Controller
{
    //

    function product_by_category($id)
    {
        $data['products'] = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id', 'tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id', 'tbl_manufacture.manufacture_id')
            ->where('tbl_products.category_id', $id)
            ->where('product_status', 1)
            ->orderBy('product_id', 'DESC')
            ->limit(18)
            ->get();

            $data['sidebar'] = view('inc.sidebar');  

        return view('pages.cat_products', $data);    
    }

    function product_by_brand($id)
    {
        $data['products'] = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id', 'tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id', 'tbl_manufacture.manufacture_id')
            ->where('tbl_products.manufacture_id',$id)
            ->where('product_status',1)
            ->orderBy('product_id', 'DESC')
            ->limit(18)
            ->get();

        $data['sidebar'] = view('inc.sidebar');  
        return view('pages.brand_products', $data);    
    }


    function view_product_detailes($id)
    {
        $data['sidebar'] = view('inc.sidebar');  
        $data['product'] = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id', 'tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id', 'tbl_manufacture.manufacture_id')
            ->where('product_id', $id)
            ->first();  
        
        return view('pages/view_single_product',$data);    
    } 




}
