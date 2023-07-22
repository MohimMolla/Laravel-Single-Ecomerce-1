@extends('layouts.dashboard')
@section('page-tittle')
All Product 
@endsection
@section('content')
<h1></h1>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> All Product</h4>
	<!-- Bootstrap Table with Header - Light -->
	<div class="card">
		@if (session()->has('message'))
		<div class="alert alert-success">
						{{ session()->get('message') }}
		</div>
@endif
			<h5 class="card-header">Available All Product Information</h5>
		<h5><a class="btn btn-info" href="{{route('addproduct')}}">Add Product</a></h5>	
			<div class="table-responsive text-nowrap">
					<!-- Add this inline CSS to the table element -->
<table class="table" style="width: 100%; overflow-x: auto;">
	<thead class="table-light">
		<thead class="table-light">
								
			<tr>
					<th>Id</th>
					<th>Product Name</th>
					<th>Product Category Name</th>
					<th>Product SubCategory Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Actions</th>
			</tr>
	</thead>
	</thead>
	<tbody class="table-border-bottom-0">
					@foreach ($products as $product)
									<tr>
													<td style="font-size: 14px;">{{$product->id}}</td>
													<td style="font-size: 14px;">{{$product->product_name}}</td>
													<td style="font-size: 14px;">{{$product->product_category_name}}</td>
													<td style="font-size: 14px;">{{$product->product_subcategory_name}}</td>
													<td style="font-size: 14px;">
																	<img src="{{ asset('productimage/' . $product->product_image) }}" height="100px" alt="">
																	<a class="btn btn-primary" style="font-size: 12px;" href="{{route('editproductimage',$product->id)}}">Update Image</a>
													</td>
													<td style="font-size: 14px;">{{$product->price}}</td>
													<td style="font-size: 14px;">
																	<a onclick="return confirm('Are you sure you want to delete this subcategory?')" class="btn btn-primary" style="font-size: 12px;" href="{{route('editproduct',$product->id)}}">Edit</a>
																	<a class="btn btn-danger" style="font-size: 12px;" href="{{route('deletproduct',$product->id)}}">Delete</a>
													</td>
									</tr>
					@endforeach
	</tbody>
</table>

			</div>
	</div>
	<!-- Bootstrap Table with Header - Light -->
</div>	
@endsection
