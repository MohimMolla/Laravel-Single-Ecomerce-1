@extends('user_templete.layouts.templete')

@section('content')
<<<<<<< HEAD
    <h1>Add to Cart Page</h1>
=======
    <h1>Add To cart page</h1>
>>>>>>> 18403d30108a3db55e181f434248fd96dad76df6
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
<<<<<<< HEAD
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
=======
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $total = 0;
                        ?>
                        @foreach ($product_details as $product)
                            <tr>
                                
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['quantity'] }}</td>
                                <td>{{ $product['price'] }}</td>
                                <td>
                                    <!-- Display the product image -->
                                    <img src="{{ asset('productimage/' . $product['image']) }}" alt="{{ $product['name'] }}" width="100">
                                </td>
                                <td>

                                    {{-- <a href="{{route('removeitem',$product->id )}}" class="btn btn-warning">Remove</a> --}}
                                    
                                </td>
                            </tr>
                            <?php
                            $total += $product['price'];
                            ?>
                        @endforeach
                        <tr>
                            <td></td>
                            <td>Total Price</td>
                            <td>{{ $total }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    
                    
>>>>>>> 18403d30108a3db55e181f434248fd96dad76df6
                </div>
            </div>
        </div>
    </div>
@endsection
