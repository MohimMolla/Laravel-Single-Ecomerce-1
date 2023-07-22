@extends('user_templete.layouts.templete')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <div class="tshirt_img">
                        <div class="tshirt_img"><img src="images/tshirt-img.png"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="product-info">
                    <div class="box_main">
                        <h4 class="shirt_text text-left">Man T -shirt</h4>
                        <p class="price_text text-left">Price <span style="color: #262626;">$ 30</span></p>

                        <div class="py-3 product-details">
                            <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur
                                excepturi in
                                ducimus commodi assumenda ipsum sunt architecto nulla veniam? Provident ex temporibus quod,
                                dolor
                                cum id commodi minima illum voluptate.</p>
                        </div>
																								<ul class="p-2 bg-light my-2">
																									<li></li>
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
