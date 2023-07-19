

@extends('layouts.dashboard')
@section('page-tittle')
	All category 
@endsection
@section('content')
<h1>All category</h1>	

<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> All category</h4>
 <!-- Bootstrap Table with Header - Light -->
 <div class="card">
	@if(session()->has('message'))
	<div class="alert alert-success">
			{{ session()->get('message') }}
	</div>
@endif

	<h5 class="card-header">Available Category Information</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead class="table-light">
					<tr>
							<th>Id</th>
							<th>Category Name</th>
							<th>Subcategory </th>
							<th>Product</th>
							<th>Actions</th>
					</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@foreach($cat as $category)
							<tr>
									<td>{{ $category->id }}</td>
									<td>{{ $category->category_name }}</td>
									<td>{{ $category->subcategory_count }}</td>
									<td>{{ $category->product_count }}</td>
									<td>
											<a class="btn btn-primary" href="">Edit</a>
											<a class="btn btn-danger" href="">Delete</a>
											<a class="btn btn-primary" href="{{ route('editcategory', ['id' => $category->id]) }}">Edit</a>
											<a class="btn btn-danger" href="{{ route('deletecategory', ['id' => $category->id]) }}">Delete</a>
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
