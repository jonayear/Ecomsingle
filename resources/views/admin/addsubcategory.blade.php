@extends('admin.layouts.template')
@section('page_title')
Add Sub Category -Ecom
@endsection
@section('content')
    <div class="container  my-3">
        <h3 class="text-center">Add Subcategory Page</h3>
        <div class="row">
            <div class="col-md-10 m-auto">
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('store.subcategory') }}">
                @csrf
                    <div class="form-group ">
                        <label for="sub_category my-2">Sub Category</label>
                        <input type="text" class="form-control my-2" name="subcategory_name" id="sub_category" aria-describedby="category" placeholder="Enter category">
                    </div>
                    <div class="form-group">
                        <label for="category">Select category</label>
                            <select class="form-control" id="category" name="category_id">
                                <option value="">Select From category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                            </select>
                    </div>
                  <button type="submit" class="btn btn-success my-2">Add Sub Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
