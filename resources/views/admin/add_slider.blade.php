@extends('backend')
@section('title', 'Add new slider')
@section('main_panel')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Add new slider</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add slider</h2>
		</div>
		<div class="box-content">

            <?php
               $msg = Session::get('msg');
               if ($msg) {
               	    echo $msg;
               	    Session::put('msg', NULL);
               }
            ?>  

			<form action="{{route('saveSlider')}}" method="post" 
			enctype="multipart/form-data" 	class="form-horizontal">
      @csrf
			  <fieldset> 

				<div class="control-group">
				  <label class="control-label" for="slider_name">slider name </label>
				  <div class="controls">
					<input type="text" name="slider_name" class="span6 typeahead" id="slider_name" >
				  </div>
				</div>


				<div class="control-group">
				  <label class="control-label" for="slider_image">slider Image</label>
				  <div class="controls">
					<input type="file" name="slider_image" class="span6 typeahead" id="slider_image" >
				  </div>
				</div>


				<div class="control-group">
				  <label class="control-label" for="textarea1">Slider Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="slider_desc" id="textarea1" rows="2"></textarea>
				  </div>
				</div>
			

				<div class="control-group">
				  <label class="control-label" for="slider_status">slider Status</label>
				  <div class="controls">
					<input type="checkbox" name="slider_status" id="slider_status" value="1">
				  </div>
				</div>


				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save slider</button>
				  <a class="btn" href="{{url('/all-sliders')}}">Cancel</a>
				</div>

			  </fieldset>

			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection