@extends('user_templete.layouts.templete')

@section('content')
    <h1>Add to Cart Page</h1>
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
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $total_price = 0; // Initialize the total price outside the loop
                        @endphp
                        @foreach ($cart_item as $item)
                            <tr>
                                @php
                                    $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                    $product_img = App\Models\Product::where('id', $item->product_id)->value('product_image');
                                @endphp
                                <td><img src="{{ asset('productimage/'.$product_img)}}" style="height: 80px" alt="product img"></td>
                                <td>{{ $product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td><a href="{{route('removeitem',$item->id)}}" class="btn btn-warning">Remove</a></td>
                            </tr>
                            @php
                                $total_price += $item->price; // Update the total price in each iteration
                            @endphp
                        @endforeach
																								@if ($total_price > 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total Price :</td>
                            <td>{{ $total_price }}</td>
																												<td><a href="{{route('shippingaddress')}}" class="btn btn-success">Checkout Now</a></td>
																												@else
																												
																												@endif
																												
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
