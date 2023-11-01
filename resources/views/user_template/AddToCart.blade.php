@extends('user_template.layouts.layouts')

@section('content')

<div class="container">
    @if(Session::has('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('msg') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button> --}}
    </div>
@endif
    <h2 class="text-center my-5">Add To Cart Page</h2>
    <table class="table text-center">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Product Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Image</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
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
            <td>{{ $item->id }}</td>
            <td>{{ $Products }}</td>
            <td>{{ $item->quantity }}</td>
            <td>
               <img style="width: 100px" src="{{asset('product_img/'.$Product_image)}}">
            </td>
            <td>{{ $item->price }}</td>
            <td>
               <a class="btn btn-outline-danger my-2" onclick="return confirm('Are you sure to delete the product')" href="{{ route('delete.order',$item->id) }}" role="button">Delete</a>
            </td>
        </tr>
        <?php $totalprice = $totalprice + $item->price ?>
        @endforeach
      </tbody>
    </table>
    <div class="">
        <div class="row">
            <div class="col-md-4">
                <h3 class="text-center">Total Price</h3>
            </div>
            <div class="col-md-8">
                <h4 class="text-center" style="margin-left:-80px; font-weight: bold;"> {{ $totalprice }}</h4><span>
                @if($totalprice != 0)
                    <a class="btn btn-outline-success my-2" href="{{ route('getshippingaddress') }}" role="button">Checkout Now</a>
                @endif
                </span>
            </div>
        </div>
    </div>
</div>
@endsection