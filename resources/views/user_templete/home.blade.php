@extends('user_templete.layouts.templete')
@section('content')
    <!-- fashion section start -->

    <div class="container">
        <h1 class="fashion_taital">Man & Woman Fashion</h1>
        <div class="fashion_section_2">
            <div class="row">
                @foreach ($allproducts as $allproduct)
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
<<<<<<< HEAD

=======
>>>>>>> 18403d30108a3db55e181f434248fd96dad76df6
                                    <form action="{{ route('addproducttocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $allproduct->id }}" name="product_id">
                                        <input type="hidden" value="{{ $allproduct->price }}" name="price">
<<<<<<< HEAD
                                        {{-- <input type="hidden" value="{{ $allproduct->quantity }}" name="quantity"> --}}
=======
>>>>>>> 18403d30108a3db55e181f434248fd96dad76df6
                                        <input type="hidden" value="1" name="quantity">

                                        <input class="btn btn-warning" type="submit" value="Buy Now">
                                    </form>
<<<<<<< HEAD

=======
>>>>>>> 18403d30108a3db55e181f434248fd96dad76df6
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
