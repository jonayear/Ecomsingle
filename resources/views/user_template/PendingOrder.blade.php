@extends('user_template.layouts.user_profile')
@section('profile_content')
 @if(Session::has('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('msg') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button> --}}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3 class="text-center">Pending Orders</h3>
            <table class="table text-center">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Product Name</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
        @foreach($Orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->product_quantity }}</td>
            <td>{{ $order->totalprice }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
        </div>
    </div>
</div>
@endsection
