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
                        <h4 class="shirt_text text-left">{{ $products->product_name }}</h4>
                        <p class="price_text text-left">Price <span style="color: #262626;">BDT:
                                {{ $products->price }}Taka</span></p>

                        <div class="py-3 product-details">
                            <p class="lead">{{ $products->product_description }}</p>
                        </div>
                        <ul class="p-2 bg-light my-2">
                            <li>Product Category ->{{ $products->product_category_name }} </li>
                            <li>Product SubCategory ->{{ $products->product_subcategory_name }} </li>
                            <li>Product Quentity ->{{ $products->quantity }} </li>
                            <li>Product Quentity ->{{ $products->price }} </li>
                        </ul>
                        <div class="btn_main">
                            <form action="{{ route('addproducttocart') }}" method="POST">
                                @csrf
                                {{-- <input type="hidden" value="{{ $products->id }}" name="product_id"> --}}
                                {{-- <input type="hidden" value="{{ $products->quantity }}" name="quantity"> --}}
                                <input type="hidden" value="{{ $products->id }}" name="product_id">
                                <input type="hidden" value="{{ $products->quantity }}" name="quantity">


                                {{-- <div class="form-group">
                                    <label for="product_Quentity">How many Pics :</label>
                                    <input class="form-control" type="number" min="1" name="price" placeholder="1" required>
                                </div> --}}
                                <div class="form-group">
                                    <label for="product_Quantity">How many Pics:</label>
                                    <input class="form-control" type="number" min="1" name="quantity" placeholder="1" required>
                                   
                                </div>
                                <br>
                                <input class="btn btn-warning" type="submit" value="Add To Cart">
                            </form>


                        </div>

                    </div>

                </div>
            </div>
        </div>
        <hr>
        <div class="fashion_section_2">
            <h3 class="fashion_taital">Releted Product</h3>
            <div class="row">

                @foreach ($releted_product as $allproduct)
                    <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                            <h4 class="shirt_text">{{ $allproduct->product_name }}</h4>
                            <p class="price_text">Price <span style="color: #262626;">BDT:
                                    {{ $allproduct->price }}Taka</span></p>

                            <div class="tshirt_img">
                                <img src="{{ asset('productimage/' . $allproduct->product_image) }}" alt="">
                            </div>

                            <div class="btn_main">
                                <div class="buy_bt">
                                    <form action="{{ route('addproducttocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $allproduct->id }}" name="product_id">
                                        <input type="hidden" value="{{ $allproduct->price }}" name="price">
                                        {{-- <input type="hidden" value="{{ $allproduct->quantity }}" name="quantity"> --}}
                                        <input type="hidden" value="1" name="quantity">


                                        <input class="btn btn-warning" type="submit" value="Add To Cart">
                                    </form>
                                </div>
                                <div class="seemore_bt"><a
                                        href="{{ route('singleproduct', ['id' => $allproduct->id, 'slug' => $allproduct->slug]) }}">See
                                        More</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
