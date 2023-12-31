@extends('user_template.layouts.layouts')

@section('content')
 <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">{{ $category->category_name }} - {{ $category->product_count }}</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                        @foreach($products as $product)
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">Tk {{ $product->price }}</span></p>
                                 <div class="tshirt_img">
                                    <img src="{{asset('product_img/'.$product->product_img)}}"></div>
                                 <div class="btn_main">
                                   <form method="POST" action="{{ route('add.cart',$product->id) }}">
                                            @csrf
                                            <input type="hidden" value="1" name="quantity">
                                            <input class="btn btn-outline-danger" type="submit" value="Add to cart" name="">
                                        </form>
                                    <div class="seemore_bt my-2"><a href="{{ route('single-product',[$product->id,$product->slug]) }}">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                        </div>
                     </div>
                  </div>
               </div>
@endsection