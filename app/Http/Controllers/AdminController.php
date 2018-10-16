<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
   

    }

    public function login_dashboard(Request $request)
    { 

       $admin_email     = $request->admin_email;
       $admin_password  = md5($request->admin_password);  

       $result = DB::table('tbl_admin')
                     ->where('admin_email', $admin_email)
                     ->where('admin_password', $admin_password)
                     ->first();

        if ($result) 
        {
           session::put( 'admin_name', $result->admin_name );
           session::put( 'admin_id', $result->admin_id );
           session::put( 'admin_email', $result->admin_email );
           return Redirect::to('/dashboard');
        }
        else
        {  
           $message = 'Wrong email or password';  
           session::put('msg', '<div class="alert alert-danger">'.$message.'</div>'); 
           return Redirect::to('/login');
        }
    }

    public function login()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
