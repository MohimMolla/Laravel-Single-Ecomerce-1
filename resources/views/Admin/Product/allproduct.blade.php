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


									<tr>
											<td>1</td>
											<td>Electronic</td>
											<td>Mobile</td>
											<td>100</td>
											<td>
													<a class="btn btn-primary" href="">Edit</a>
													<a class="btn btn-danger" href="">Delet</a>
											</td>
									</tr>
							</tbody>
					</table>
			</div>
	</div>
	<!-- Bootstrap Table with Header - Light -->
</div>	
@endsection
