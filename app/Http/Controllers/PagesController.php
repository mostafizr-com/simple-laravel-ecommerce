<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Here The main Hom page is outputing
    function index(){
    	return view('pages/home_content');
    }


}
