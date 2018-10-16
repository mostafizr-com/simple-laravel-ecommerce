<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['sliders'] = DB::table('tbl_sliders')
                          ->orderBy('slider_id','DESC')
                          ->get();
        return view('admin/all_sliders', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/add_slider');       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        //
        $data['slider_name'] = $req->slider_name;
        $data['slider_desc'] = $req->slider_desc;
        $data['slider_status'] = $req->slider_status;

        $image = $req->file('slider_image');


        if($image)
        {
            $ext = strtolower($image->getClientOriginalExtension());

            $new_file = str_random(10).'-'.time().'.'.$ext;    
            $path = 'public/slider-images/';
            $img_url =  $path.$new_file;
            $data['slider_image'] = $img_url;
    
            if($image->move($path, $new_file))
            {


                $inser = DB::table('tbl_sliders')->insertGetId($data); 
    
                $message = "Slider saved Successfully";	     
                Session::put('msg', '<div class="alert alert-success">'.$message.'</div>');
                return Redirect::to('/add-new-slider');               
            }
            else
            {
                $message = "Error! Slider not saved Successfully";	     
                Session::put('msg', '<div class="alert alert-danger">'.$message.'</div>');
                return Redirect::to('/add-new-slider');             
            }            
        }
        else
        {
            $message = "Error! Please select a valid image";	     
            Session::put('msg', '<div class="alert alert-danger">'.$message.'</div>');
            return Redirect::to('/add-new-slider'); 
        }
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
        $data['slider'] = DB::table('tbl_sliders')
                             ->where('slider_id', $id)
                             ->first();
        return view('admin/edit_slider',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $data['slider_name'] = $req->slider_name;
        $data['slider_desc'] = $req->slider_desc;
        $data['slider_status'] = $req->slider_status;

        $image = $req->file('slider_image');

        $img = DB::table('tbl_sliders')
                ->where('slider_id', $id)
                ->first();

        if ($image) 
        {
            $ext = strtolower($image->getClientOriginalExtension());

            $new_file = str_random(10).'-'.time().'.'.$ext;    
            $path = 'public/slider-images/';
            $img_url =  $path.$new_file;

            $data['slider_image'] = $img_url;
    
            if ($img->slider_image != "") 
            {
                unlink($img->slider_image);

                $image->move($path, $new_file);
            }            

   
        }
        else
        {
            $data['slider_image'] = $img->slider_image;           
            
        }      
        
        
            DB::table('tbl_sliders')
                ->where('slider_id', $id)
                ->update($data); 

            $message = "Slider Updated Successfully";	     
            Session::put('msg', '<div class="alert alert-success">'.$message.'</div>');
            return Redirect::to('/edit-slider/'. $id);               


    }


    function inactive_slider($id)
    {
      DB::table('tbl_sliders')
          ->where('slider_id', $id)
          ->update(['slider_status' => 0]);
      return Redirect('/all-sliders');
    }
  
    function active_slider($id)
    {
      DB::table('tbl_sliders')
          ->where('slider_id', $id)
          ->update(['slider_status' => 1]);
      return Redirect('/all-sliders');
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
