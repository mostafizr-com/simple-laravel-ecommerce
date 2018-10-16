<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session; 

class BrandController extends SuperAdminController
{

  function add_new_brand()
  {
     return view('admin.add_brand');
  }

  function all_brands()
  {
     $data['cats'] = DB::table('tbl_manufacture')
                        ->orderBy('manufacture_name','ASC')   
                        ->get();
  	 $data['ok'] = "yes its working";
     // $all_cats = 
     // return view('admin.all_brands')->with('cats', $cats);
     return view('admin.all_brands', $data);

     // return view('backend')->with('admin.all_brands', $all_cats);

  }

  function save_brand(Request $req)
  {
     $data = array(
     	            'manufacture_name' => $req->manufacture_name,
     	            'manufacture_description' => $req->manufacture_description,
     	            'manufacture_status' => $req->manufacture_status,
     	          );

     $insert = DB::table('tbl_manufacture')->insert( $data );
     if ($insert == TRUE) 
     {
         $message = "brand inserted Successfully";	     
         Session::put('msg', '<div class="alert alert-success">'.$message.'</div>');
	     return Redirect::to('/add-new-brand'); 
     }
     else
     {
         $message = "Opps! brand Not inserted Successfully";
         Session::put('msg', '<div class="alert alert-danger">'.$message.'</div>');
         return Redirect::to('/add-new-brand');  
     }   
  }

  function inactive_brand($id)
  {
    DB::table('tbl_manufacture')
        ->where('manufacture_id', $id)
        ->update(['manufacture_status' => 0]);
    return Redirect('/all-brands');
  }

  function active_brand($id)
  {
    DB::table('tbl_manufacture')
        ->where('manufacture_id', $id)
        ->update(['manufacture_status' => 1]);
    return Redirect('/all-brands');
  }

  function edit_brand($id = FALSE)
  {
    
    if ($id == FALSE) 
    {
    	return Redirect('/all-brands');
    }
    else
    {   
       $data['cat'] = DB::table('tbl_manufacture')
                  ->where('manufacture_id',$id)
                  ->first(); 
        return view('admin.edit_brand',$data);    	
    }

  }

  function update_brand(Request $req, $id)
  {
     $data   = array(
                 'manufacture_name' => $req->manufacture_name,
                 'manufacture_description' => $req->manufacture_description,
                 'manufacture_status' => $req->manufacture_status                 
               );
                  
     $update = DB::table('tbl_manufacture')
               ->where('manufacture_id',$id)
               ->update($data); 

    if ($update == TRUE) 
    {
       $message = "brand Updated Successfully!";
       Session::put('msg', '<div class="alert alert-success">'.$message.'</div>');
       return Redirect::to('/edit-brand/'.$id); 
    }               
  }


  function delete_brand($id)
  {
      $delete = DB::table('tbl_manufacture')
                    ->where('manufacture_id', $id )
                    ->delete();

      if ($delete == TRUE)
      {
       $message = "brand deleted Successfully!";
       Session::put('msg', '<div class="alert alert-danger">'.$message.'</div>');
       return Redirect::to('/all-brands'); 
      }              
  }
}
