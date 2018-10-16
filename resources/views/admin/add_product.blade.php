@extends('backend')
@section('title', 'Add new Product')
@section('main_panel')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Add new Product</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
		</div>
		<div class="box-content">

            <?php
               $msg = Session::get('msg');
               if ($msg) {
               	    echo $msg;
               	    Session::put('msg', NULL);
               }
            ?>  

			<form action="{{url('/save-product')}}" method="post" 
			enctype="multipart/form-data" 	class="form-horizontal">
      @csrf
			  <fieldset> 

				<div class="control-group">
				  <label class="control-label" for="product_name">Product name </label>
				  <div class="controls">
					<input type="text" name="product_name" class="span6 typeahead" id="product_name" >
				  </div>
				</div>


            <div class="control-group">
                <label class="control-label" for="category_id">Category</label>
                <div class="controls">
                <select name="category_id" class="form-control">
									  <option selected>Select product category</option>									
									@foreach ($categories as $category)
										<option value="{{ $category->category_id }}">{{ $category->category_name }}</option>									
									@endforeach
                </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="manufacture_id">Manufacture</label>
                <div class="controls">
                <select name="manufacture_id" class="form-control">
									   	<option selected>Select product Manufacture</option>
									  @foreach ($manufactures as $brand)
						      		<option value="{{ $brand->manufacture_id }}">{{ $brand->manufacture_name }}</option>
										@endforeach
                </select>
                </div>
            </div>            


				<div class="control-group">
				  <label class="control-label" for="textarea1">Short Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="product_short_description" id="textarea1" rows="2"></textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="textarea2">Brief  Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="product_long_description" id="textarea2" rows="3"></textarea>
				  </div>
				</div>


				<div class="control-group">
				  <label class="control-label" for="product_image">Product Image</label>
				  <div class="controls">
					<input type="file" name="product_image" class="span6 typeahead" id="product_image" >
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="product_price">Product Price</label>
				  <div class="controls">
					<input type="number" name="product_price" class="span6 typeahead" id="product_price" >
				  </div>
				</div>				

				<div class="control-group">
				  <label class="control-label" for="product_size">Product Size</label>
				  <div class="controls">
					<input type="text" name="product_size" class="span6 typeahead" id="product_size" >
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="product_color">Product Color</label>
				  <div class="controls">
					<input type="text" name="product_color" class="span6 typeahead" id="product_color" >
				  </div>
				</div>				

				<div class="control-group">
				  <label class="control-label" for="product_status">Product Status</label>
				  <div class="controls">
					<input type="checkbox" name="product_status" id="product_status" value="1">
				  </div>
				</div>


				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save Product</button>
				  <a class="btn" href="{{url('/all-products')}}">Cancel</a>
				</div>

			  </fieldset>

			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection