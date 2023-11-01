@extends('user_template.layouts.layouts')

@section('content')
@if(Session::has('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('msg') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button> --}}
    </div>
@endif
<div class="container">
    <h2 class="text-center my-5">Add To Cart Page</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Product Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cart_item as $item)
        @php
            $Products = App\Models\Product::where('id',$item->product_id)->value('product_name');
            $Product_image = App\Models\Product::where('id',$item->product_id)->value('product_img');
        @endphp
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $Products }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }}</td>
            <td>
               <img style="width: 100px" src="{{asset('product_img/'.$Product_image)}}">
            </td>
            <td>
               <a class="btn btn-outline-danger my-2" onclick="return confirm('Are you sure to delete the product')" href="" role="button">Delete</a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection