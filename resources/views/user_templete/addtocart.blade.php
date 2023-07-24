@extends('user_templete.layouts.templete')

@section('content')
    <h1>Add To cart page</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="box_main">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
																								@foreach ($product_details as $product)
																								<tr>
																												<td>{{ $product['name'] }}</td>
																												<td>{{ $product['quantity'] }}</td>
																												<td>{{ $product['price'] }}</td>
																												<td>{{ $product['price'] }}</td>
																											 <td>
																													<!-- Display the product image -->
																													<img src="{{ asset('productimage/' . $product['image']) }}" alt="{{ $product['name'] }}" width="100">
																									</td>
																												<td><a class="btn btn-warning" href="">Remove</a></td>
																								</tr>
																				@endforeach
																				
																				
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
