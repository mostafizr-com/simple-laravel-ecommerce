@extends('backend')
@section('title', 'All categories')
@section('main_panel')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Tables</a></li>
</ul>

<br>
	<a class="btn btn-info" href="{{URL::to('/add-new-category')}}">
		<i class="icon-plus"></i>
		<span class="hidden-tablet"> Add Category</span>
	</a>
<br><br>
            <?php
               $msg = Session::get('msg');
               if ($msg) {
               	    echo $msg;
               	    Session::put('msg', NULL);
               }
            ?>  

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Categories</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Sr</th>
					  <th>Category Name</th>
					  <th>Category Description</th>
					  <th>Category Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
               <?php
                  $sr = 0; 
               ?>
               @foreach( $cats as $row )
                <?php $sr++; ?>
				<tr>
					<td>{{ $sr }}</td>
					<td class="center">{{ $row->category_name }}</td>
					<td class="center">{!! $row->category_description !!}</td>
					<td class="center">
						@if($row->category_status == 1) 
						  <span class="label label-success">{{'Active'}}</span> 
						@else 
						  <span class="label label-danger">{{'Inactive'}}</span> 
					    @endif
					</td>
					<td class="center">
                       @if($row->category_status == 1) 
						<a class="btn btn-danger" href="{{url('/inactive-category/'.$row->category_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
					   @else
						<a class="btn btn-success" href="{{url('/active-category/'.$row->category_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>					   
					   @endif

						<a class="btn btn-info" href="{{url('/edit-category/'.$row->category_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{url('/delete-category/'.$row->category_id)}}" id="delete">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
                
                @endforeach

			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection