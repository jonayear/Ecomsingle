@extends('admin.layouts.template')
@section('page_title')
Category -Ecom
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <h3 class="text-center">Cateory page</h3>
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
                            <th scope="col">Category Name</th>
                            <th scope="col">Product Count</th>
                            <th scope="col">Sub Category Count</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($category as $category)
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->subcategory_count }}</td>
                                <td>{{ $category->product_count }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a class="btn btn-outline-warning" href="{{ route('edit.category',$category->id) }}" role="button">Edit</a>
                                    <a class="btn btn-outline-danger" onclick="return confirm('Are You Sure To Delete Category?')" href="{{ route('delete.category',$category->id) }}" role="button">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
