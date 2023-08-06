@extends('user_templete.layouts.user_profile_template')
@section('userprofile')
    <h3>Pendings order </h3>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <tr>

                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>

            </tr>

            @foreach ($pending_orders as $item)
                <tr>
                    @php
                        $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                    @endphp
                    <td>{{ $item->id }}</td>
                    <td>{{ $product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->total_price }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
