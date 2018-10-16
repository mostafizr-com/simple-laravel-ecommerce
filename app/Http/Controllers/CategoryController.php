<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class CategoryController extends SuperAdminController
{


  function add_new_category()
  {
     return view('admin.add_category');
  }

  function all_categories()
  {
     $data['cats'] = DB::table('tbl_category')
                         ->orderBy('category_name','ASC')   
                         ->get();
  	 $data['ok'] = "yes its working";
     // $all_cats = 
     // return view('admin.all_categories')->with('cats', $cats);
     return view('admin.all_categories', $data);

     // return view('backend')->with('admin.all_categories', $all_cats);

  }

  function save_category(Request $req)
  {
     $data = array(
     	            'category_name' => $req->category_name,
     	            'category_description' => $req->category_description,
     	            'category_status' => $req->category_status,
     	          );

     $insert = DB::table('tbl_category')->insert( $data );
     if ($insert == TRUE) 
     {
         $message = "Category inserted Successfully";	     
         Session::put('msg', '<div class="alert alert-success">'.$message.'</div>');
	     return Redirect::to('/add-new-category'); 
     }
     else
     {
         $message = "Opps! Category Not inserted Successfully";
         Session::put('msg', '<div class="alert alert-danger">'.$message.'</div>');
         return Redirect::to('/add-new-category');  
     }   
  }

  function inactive_category($id)
  {
    DB::table('tbl_category')
        ->where('category_id', $id)
        ->update(['category_status' => 0]);
    return Redirect('/all-categories');
  }

  function active_category($id)
  {
    DB::table('tbl_category')
        ->where('category_id', $id)
        ->update(['category_status' => 1]);
    return Redirect('/all-categories');
  }

  function edit_category($id = FALSE)
  {
    
    if ($id == FALSE) 
    {
    	return Redirect('/all-categories');
    }
    else
    {   
       $data['cat'] = DB::table('tbl_category')
                  ->where('category_id',$id)
                  ->first(); 
        return view('admin.edit_category',$data);    	
    }

  }

  function update_category(Request $req, $id)
  {
     $data   = array(
                 'category_name' => $req->category_name,
                 'category_description' => $req->category_description,
                 'category_status' => $req->category_status                 
               );
                  
     $update = DB::table('tbl_category')
               ->where('category_id',$id)
               ->update($data); 

    if ($update == TRUE) 
    {
       $message = "Category Updated Successfully!";
       Session::put('msg', '<div class="alert alert-success">'.$message.'</div>');
       return Redirect::to('/edit-category/'.$id); 
    }               
  }


  function delete_category($id)
  {
      $delete = DB::table('tbl_category')
                    ->where('category_id', $id )
                    ->delete();

      if ($delete == TRUE)
      {
       $message = "Category deleted Successfully!";
       Session::put('msg', '<div class="alert alert-danger">'.$message.'</div>');
       return Redirect::to('/all-categories'); 
      }              
  }

}
