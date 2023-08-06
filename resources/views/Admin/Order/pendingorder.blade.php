@extends('layouts.dashboard')

@section('page-tittle')
    All Order
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-tittle text-center"><h3>Pending Orders</h3></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>User Id</th>
                            <th>Shipping Information</th>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Total Will</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($pending_orders as $p_order)
                            <tr>

                                <td>{{ $p_order->user_id }}</td>
                                <td>
                                    <ul>
                                        <li>Phone Number : {{ $p_order->shipping_phoneNumber }} </li>
                                        <li>Shipping City : {{ $p_order->shipping_city }} </li>
                                        <li>Postal Code : {{ $p_order->shipping_postalcode }}</li>
                                    </ul>
                                </td>
                               
                                <td>{{ $p_order->product_id }}</td>
                                <td>{{ $p_order->quantity }}</td>
                                <td>{{ $p_order->total_price }}</td>
                                <td>{{ $p_order->status }}</td>
																																<td><a class="btn btn-success" href="">Approve Now</a></td>

                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
