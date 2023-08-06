@extends('user_templete.layouts.templete')

@section('content')
    <h1>Fineal Steap To cheack Out your order</h1>

    <div class="row">
        <div class="col-6">
            <div class="box_main">
                <h3>Product Will sent at :-</h3>
                <p>Phone Noumber : {{ $shipping_item->phone_number }}</p>
                <p>City/ Village name : {{ $shipping_item->city_name }}</p>
                <p>Postal Code : {{ $shipping_item->postal_code }}</p>
            </div>
        </div>
        <div class="col-5">
            <div class="box_main">
                <h3>Your Final Products Are :-</h3>
                <div class="table-responsive">
                    <table class="table">
                        <tr>

                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>

                        </tr>
                        @php
                            $total_price = 0; // Initialize the total price outside the loop
                        @endphp
                        @foreach ($cart_item as $item)
                            <tr>
                                @php
                                    $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                    
                                @endphp

                                <td>{{ $product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                            </tr>
                            @php
                                $total_price += $item->price; // Update the total price in each iteration
                            @endphp
                        @endforeach
                        @if ($total_price > 0)
                            <tr>

                                <td></td>
                                <td>Total Price :</td>
                                <td>{{ $total_price }}</td>
                            @else
                        @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <form action="{{ route('placeorder') }}" method="POST">
            @csrf
            <input type="submit" value="Place Order" class="btn btn-primary mr-2">
        </form>
        <form action="" method="POST">
            @csrf
            <input type="submit" value="Cancel Order" class="btn btn-danger">
        </form>
    </div>
@endsection
