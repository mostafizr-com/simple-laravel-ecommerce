<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

session_start();

class SuperAdminController extends Controller
{

    function index()
    {
        $this->adminAuth();
        return view('admin/dashboard');
    }

    public function logout()
    {
    	Session::flush();
    	return Redirect::to('/login');
    }

    function adminAuth()
    {
        $current_admin = Session::get('admin_id');

        if($current_admin)
        {
            return; 
        }
        else
        {
            return Redirect::to('/login')->send();
        }
    }

}
