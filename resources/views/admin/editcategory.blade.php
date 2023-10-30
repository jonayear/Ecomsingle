@extends('admin.layouts.template')
@section('page_title')
Edit Category -Ecom
@endsection
@section('content')
    <div class="container  my-3">
        <h3 class="text-center">Edit Category</h3>
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
                <form method="POST" action="{{ route('update.category',$category->id) }}">
                @csrf
                  <div class="form-group ">
                    <label for="category my-2">Category</label>
                    <input type="text" class="form-control my-2" value="{{ $category->category_name }}" name="category_name" id="category">
                  </div>
                  <button type="submit" class="btn btn-success my-2">Update Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
