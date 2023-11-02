@extends('user_template.layouts.layouts')

@section('content')
<h2 class="text-center my-5">CheckOut Page</h2>
<div class="container ">
    <div class="row">
        <div class="col-md-5 box_main">
           <h4 class="text-center">Product Will Send At:</h4>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $shipping_add->phone_no }}</li>
              <li class="list-group-item">{{ $shipping_add->city_name }}</li>
              <li class="list-group-item">{{ $shipping_add->postal_code }}</li>
            </ul>
        </div>
        <div class="col-md-7 box_main">
            <h4 class="text-center">Your Final Product:</h4>
            <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Image</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
                <?php $totalprice = 0; ?>
                @foreach($cart_item as $item)
                @php
                    $Products = App\Models\Product::where('id',$item->product_id)->value('product_name');
                    $Product_image = App\Models\Product::where('id',$item->product_id)->value('product_img');
                @endphp
                <tr>
                    <td>{{ $Products }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                       <img style="width: 100px" src="{{asset('product_img/'.$Product_image)}}">
                    </td>
                    <td>{{ $item->price }}</td>
                </tr>
                <?php $totalprice = $totalprice + $item->price ?>
                @endforeach
              </tbody>
            </table>
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center">Total Price</h3>
                </div>
                <div class="col-md-8">
                    <h4 class="text-center" style="margin-left:310px; font-weight: bold;"> {{ $totalprice }}</h4>
                </div>
            </div>
            <form method="Post" action="{{route('confirmorder')}}">
                @csrf
                <button type="submit" class="btn btn-success my-2">Place Order</button>
            </form>
             <form method="Post" action="">
                @csrf
                  <input type="submit" class="btn btn-danger my-2" value="Cancel Order">
            </form>
        </div>

    </div>
    <div class="row my-5">
        <div class="col-md-8  m-auto">

        </div>
    </div>
</div>

@endsection