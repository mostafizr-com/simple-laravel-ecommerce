@extends('backend')
@section('title', 'Edit Product')
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

			<form action="{{url('/update-product', $product->product_id)}}" method="post" 
			enctype="multipart/form-data" 	class="form-horizontal">
      @csrf
			  <fieldset> 

				<div class="control-group">
				  <label class="control-label" for="product_name">Product name </label>
				  <div class="controls">
					<input type="text" name="product_name" class="span6 typeahead" id="product_name" 
					value="{{ $product->product_name }}">
				  </div>
				</div>


            <div class="control-group">
                <label class="control-label" for="category_id">Category</label>
                <div class="controls">
                <select name="category_id" class="form-control">
									  <option selected>Select product category</option>									
									@foreach ($categories as $category)
										<option 
											@if ($category->category_id == $product->category_id)
													selected
											@endif
										value="{{ $category->category_id }}">{{ $category->category_name }}</option>									
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
											<option 

												@if ($brand->manufacture_id == $product->manufacture_id)
														selected
												@endif											
											
											value="{{ $brand->manufacture_id }}">{{ $brand->manufacture_name }}</option>
										@endforeach
                </select>
                </div>
            </div>            


				<div class="control-group">
				  <label class="control-label" for="textarea1">Short Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="product_short_description" id="textarea1" rows="2">
						{!! $product->product_short_description !!}</textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="textarea2">Brief  Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="product_long_description" id="textarea2" rows="3">
							{!! $product->product_long_description !!}
					</textarea>
				  </div>
				</div>
	
				
			 @if ($product->product_image)
				<div class="control-group product-thumb">
						<img class="controls" style="height:120px; width:200px; border:1px solid #D7D7D7; padding:5px;" 
						src="{{asset($product->product_image)}}">
				</div>					 
			 @endif	

				  
				<div class="control-group">
				  <label class="control-label" for="product_image">Product Image</label>
				  <div class="controls">
					<input type="file" name="product_image" class="span6 typeahead" id="product_image" >
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="product_price">Product Price</label>
				  <div class="controls">
					<input type="number" name="product_price" class="span6 typeahead" id="product_price" 
					value="{{ $product->product_price }}">
				  </div>
				</div>				

				<div class="control-group">
				  <label class="control-label" for="product_size">Product Size</label>
				  <div class="controls">
					<input type="text" name="product_size" class="span6 typeahead" id="product_size" 
					value="{{ $product->product_size }}">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="product_color">Product Color</label>
				  <div class="controls">
					<input type="text" name="product_color" class="span6 typeahead" id="product_color" 
					value="{{ $product->product_color }}">
				  </div>
				</div>				

				<div class="control-group">
				  <label class="control-label" for="product_status">Product Status</label>
				  <div class="controls">
					<input type="checkbox" name="product_status" id="product_status" value="1"
					@if ($product->product_status == 1)
							checked
					@endif>
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