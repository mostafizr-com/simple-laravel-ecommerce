<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['featured'] = DB::table('tbl_products')
                                ->join('tbl_category', 'tbl_products.category_id', 'tbl_category.category_id')
                                ->join('tbl_manufacture', 'tbl_products.manufacture_id', 'tbl_manufacture.manufacture_id')
                                ->orderBy('product_id','DESC')
                                ->where('product_status',1)
                                ->limit(6)                 
                                ->get();       
                                
        $data['sliders'] = DB::table('tbl_sliders')
                                ->orderBy('slider_id','DESC')
                                ->where('slider_status',1)
                                ->limit(6)                 
                                ->get(); 
                                
        $data['sidebar'] = view('inc.sidebar');                        

                                
        return view('pages/home_content', $data);
    }
}
