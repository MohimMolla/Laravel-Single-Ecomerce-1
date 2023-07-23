@extends('user_templete.layouts.templete')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <div class="tshirt_img">
                        <div class="tshirt_img"><img src="{{ asset('productimage/' . $products->product_image) }}"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="product-info">
                    <div class="box_main">
                        <h4 class="shirt_text text-left">{{$products->product_name}}</h4>
                        <p class="price_text text-left">Price <span style="color: #262626;">BDT: {{$products->price}}Taka</span></p>

                        <div class="py-3 product-details">
                            <p class="lead">{{$products->product_description}}</p>
                        </div>
                        <ul class="p-2 bg-light my-2">
                            <li>Product Category ->{{$products->product_category_name}} </li>
                            <li>Product SubCategory ->{{$products->product_subcategory_name}} </li>
                            <li>Product Quentity ->{{$products->quantity}} </li>
                        </ul>
                        <div class="btn_main">
                            <div class="btn btn-warning">
                                <a href="#">Add to Cart</a>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endsection
