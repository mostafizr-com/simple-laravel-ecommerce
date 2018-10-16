@extends('backend')
@section('title', 'Edit Brand')
@section('main_panel')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Update manufacture</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update manufacture</h2>
		</div>
		<div class="box-content">

            <?php
               $msg = Session::get('msg');
               if ($msg) {
               	    echo $msg;
               	    Session::put('msg', NULL);
               }
            ?>  

			<form action="{{url('/update-brand', $cat->manufacture_id)}}" method="post" class="form-horizontal">
              {{ csrf_field() }}
			  <fieldset> 

				<div class="control-group">
				  <label class="control-label" for="manufacture_name">manufacture name </label>
				  <div class="controls">
					<input type="text" name="manufacture_name" class="span6 typeahead" id="manufacture_name" value="{{ $cat->manufacture_name }}">
				  </div>
				</div>


				<div class="control-group">
				  <label class="control-label" for="textarea2">manufacture Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="manufacture_description" id="textarea2" rows="3">{!! $cat->manufacture_description !!}</textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="manufacture_status">manufacture Status</label>
				  <div class="controls">
					<input type="checkbox" name="manufacture_status" id="manufacture_status" value="1" @if($cat->manufacture_status == 1)checked @endif>
				  </div>
				</div>


				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update Brand</button>
				  <a class="btn" href="{{url('/all-brands')}}">Cancel</a>
				</div>

			  </fieldset>

			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection