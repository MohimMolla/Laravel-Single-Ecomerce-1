@extends('user_templete.layouts.templete')
@section('content')
    <!-- fashion section start -->


    <div class="container">
        <h1 class="fashion_taital">{{ $category->category_name }} -> ({{ $category->product_count }})</h1>
        <div class="fashion_section_2">
            <div class="row">
                @foreach ($products as $allproduct)
                    <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                            <h4 class="shirt_text">{{ $allproduct->product_name }}</h4>
                            <p class="price_text">Price <span style="color: #262626;">BDT:
                                    {{ $allproduct->price }}Taka</span></p>

                            <div class="tshirt_img">
                                <img src="{{ asset('productimage/' . $allproduct->product_image) }}" alt="">
                            </div>

                            <div class="btn_main">
                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                <div class="seemore_bt"><a href="{{ route('singleproduct', ['id' => $allproduct->id, 'slug' => $allproduct->slug]) }}">See More</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    </div>
@endsection
