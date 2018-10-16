@extends('backend')
@section('title', 'Edit category')
@section('main_panel')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Update category</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
		</div>
		<div class="box-content">

            <?php
               $msg = Session::get('msg');
               if ($msg) {
               	    echo $msg;
               	    Session::put('msg', NULL);
               }
            ?>  

			<form action="{{url('/update-category', $cat->category_id)}}" method="post" class="form-horizontal">
              {{ csrf_field() }}
			  <fieldset> 

				<div class="control-group">
				  <label class="control-label" for="category_name">Category name </label>
				  <div class="controls">
					<input type="text" name="category_name" class="span6 typeahead" id="category_name" value="{{ $cat->category_name }}">
				  </div>
				</div>


				<div class="control-group">
				  <label class="control-label" for="textarea2">Category Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="category_description" id="textarea2" rows="3">{!! $cat->category_description !!}</textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="category_status">Category Status</label>
				  <div class="controls">
					<input type="checkbox" name="category_status" id="category_status" value="1" @if($cat->category_status == 1)checked @endif>
				  </div>
				</div>


				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update Category</button>
				  <a class="btn" href="{{url('/all-categories')}}">Cancel</a>
				</div>

			  </fieldset>

			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection