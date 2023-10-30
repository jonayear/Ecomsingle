@extends('admin.layouts.template')
@section('page_title')
Sub Category -Ecom
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <h3 class="text-center">Sub Category page</h3>
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
                            <th scope="col">Sub Category Name</th>
                            <th scope="col">Category Nmae</th>
                            <th scope="col">Category Id</th>
                            <th scope="col">product Count</th>
                            <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($SubCategories as $SubCategory)
                        <tr>
                            <th scope="col">{{ $SubCategory->id }}</th>
                            <th scope="col">{{ $SubCategory->subcategory_name }}</th>
                            <th scope="col">{{ $SubCategory->category_name }}</th>
                            <th scope="col">{{ $SubCategory->category_id }}</th>
                            <th scope="col">{{ $SubCategory->product_count }}</th>

                            <td>
                                <a class="btn btn-outline-warning" href="{{ route('edit.subcategory',$SubCategory->id) }}" role="button">Edit</a>
                                <a class="btn btn-outline-danger" href="{{ route('delete.subcategory',$SubCategory->id)}}" role="button">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
