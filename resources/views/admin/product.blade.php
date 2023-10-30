@extends('admin.layouts.template')
@section('page_title')
Product -Ecom
@endsection
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto">
                <h3 class="text-center">Product page</h3>
                    @if(Session::has('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                        </div>
                    @endif
                    <table class="table table-dark my-2">
                      <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Short Description</th>
                            <th scope="col">Long Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Product Quantity</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Sub Category name</th>
                             <th scope="col">Category Id</th>
                            <th scope="col">Sub Category Id</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($Products as $Product)
                            <tr>
                                <th>{{ $Product->id }}</th>
                                <td>{{ $Product->product_name }}</td>
                                <td>{{ $Product->product_short_des }}</td>
                                <td>{{ $Product->product_long_des }}</td>
                                <td>Tk{{ $Product->price }}</td>
                                <td>{{ $Product->product_category_name }}</td>
                                <td>{{ $Product->product_subcategory_name }}</td>
                                <td>{{ $Product->product_category_id }}</td>
                                <td>{{ $Product->product_subcategory_id }}</td>
                                <td>
                                    <img style="width: 100px" src="{{asset('product_img/'.$Product->product_img)}}">
                                </td>
                                <td>{{ $Product->quantity }}</td>
                                <td>{{ $Product->slug }}</td>
                                <td>
                                    <a class="btn btn-outline-warning my-2" href="{{ route('edit.product',$Product->id) }}" role="button">Update</a>
                                    <a class="btn btn-outline-danger my-2" onclick="return confirm('Are you sure to delete the product')" href="{{ route('delete.product',$Product->id) }}" role="button">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
