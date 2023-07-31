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
                    
                    
                </div>
            </div>
        </div>
    </div>
@endsection
