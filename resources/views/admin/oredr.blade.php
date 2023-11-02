@extends('admin.layouts.template')
@section('page_title')
Order -Ecom
@endsection
@section('content')
    <div class="container">
        <h3 class="text-center">Order Page</h3>
        <table class="table table-dark">
                      <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Shipping Phone Number</th>
                            <th scope="col">City</th>
                            <th scope="col">Postal Code</th>
                            <th scope="col">Product Id</th>
                             <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                             <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th>{{ $order->id }}</th>
                                <td>{{ $order->user_id }}</td>
                                <th>{{ $order->shipping_phoneno }}</th>
                                <td>{{ $order->shipping_city }}</td>
                                 <th>{{ $order->shipping_postalcode }}</th>
                                <td>{{ $order->product_id }}</td>
                                <th>{{ $order->product_quantity }}</th>
                                <td>{{ $order->totalprice }}</td>
                                <td>
                                     <a class="btn btn-outline-warning my-2" href="" role="button">Confirm</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
    </div>
@endsection
