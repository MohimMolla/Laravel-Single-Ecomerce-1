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
			<div class="table-responsive text-nowrap">
					<table class="table">
							<thead class="table-light">
								
									<tr>
											<th>Id</th>
											<th>Product Name</th>
											<th>Image</th>
											<th>Price</th>
											<th>Actions</th>
									</tr>
							</thead>
							<tbody class="table-border-bottom-0">

								@foreach ($products as $product)
												
						
									<tr>
											<td>{{$product->id}}</td>
											<td>{{$product->product_name}}</td>
											<td>{{$product->product_category_name}}</td>
											<td>{{$product->product_subcategory_name}}</td>
											<td>{{$product->product_subcategory_name}}</td>
											<td>
												<img src="{{ asset('productimage/' . $product->product_image) }}" height="100px" alt="">
												<a class="btn btn-primary" href="{{route('editproductimage',$product->id)}}">Update Image</a>
											</td>
											<td>
													<a class="btn btn-primary" href="{{route('editproduct',$product->id)}}">Edit</a>
													<a class="btn btn-danger" href="{{route('deletproduct',$product->id)}}">Delet</a>
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
