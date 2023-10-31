@extends('user_template.layouts.layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 " style="margin-left:100px;">
            <div class="row">
                <div class="col-md-6">
                    <div class="box_main">
                       <img src="{{asset('product_img/'.$products->product_img)}}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <div class="col-md-6 box_main">
                    <div class="box_main">
                        <div class="product_info">
                            <h4 class="shirt_text">{{ $products->product_name }}</h4>
                            <p class="price_text">Price  <span style="color: #262626;">Tk {{ $products->price }}</span></p>
                        </div>
                        <div class="product_details my-3">
                            <p class="">  <span style="color: #262626;">{{ $products->product_long_des }}</span></p>
                            <p class=""> <span style="color: #262626;">{{ $products->product_short_des}}</span></p>
                            <p class="price_text text-left" style="margin-left:20px;">Product Category: <span style="color: #262626;"> {{ $products->product_category_name}}</span></p>
                            <p class="price_text text-left" style="margin-left:20px;">Product Sub Category: <span style="color: #262626;"> {{ $products->product_subcategory_name}}</span></p>
                            <p class="price_text text-left" style="margin-left:20px;">Product Quantity: <span style="color: #262626;"> {{ $products->quantity}}</span></p>
                        </div>
                        <div class="btn_main">
                            <form method="POST" action="{{ route('add.cart',$products->id) }}">
                                @csrf
                                <input class="btn btn-outline-danger" type="submit" value="Add to cart" name="">
                            </form>
                            {{-- <div class="btn btn-outline-danger"><a href="#">Add To Cart</a></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">Related Product</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @foreach($related_products as $related_product)
                                <div class="col-lg-4 col-sm-4">
                                    <div class="box_main">
                                    <h4 class="shirt_text">{{ $related_product->product_name }}</h4>
                                    <p class="price_text">Price  <span style="color: #262626;">Tk {{ $related_product->price }}</span></p>
                                    <div class="tshirt_img">
                                        <img src="{{asset('product_img/'.$related_product->product_img)}}"></div>
                                    <div class="btn_main">
                                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                                        <div class="seemore_bt"><a href="{{ route('single-product',[$related_product->id,$related_product->slug]) }}">See More</a></div>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection