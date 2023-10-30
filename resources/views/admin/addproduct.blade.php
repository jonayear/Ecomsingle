@extends('admin.layouts.template')
@section('page_title')
Add Product -Ecom
@endsection
@section('content')
    <div class="container  my-3">
        <h3 class="text-center">Product Page</h3>
        <div class="row">
            <div class="col-md-10 m-auto" enctype="multipart/form-data">
                <form method="POST" action="{{ route('store.product') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">
                        <label for="p_name my-2">Product Name</label>
                        <input type="text" class="form-control my-2" name="product_name" id="p_name" aria-describedby="category" placeholder="Enter category">
                    </div>
                    <div class="form-group ">
                        <label for="s_description my-2">Short Description</label>
                       <textarea class="form-control" id="s_description" name="product_short_des" rows="3"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="l_description my-2">Long Description</label>
                        <textarea class="form-control" id="product_long_des" name="product_long_des" rows="3"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="price my-2">Price</label>
                        <input type="number" class="form-control my-2" name="price" id="price" aria-describedby="category" placeholder="Enter category">
                    </div>
                    <div class="form-group ">
                        <label for="quantity my-2">Product Quantity</label>
                        <input type="number" class="form-control my-2" name="quantity" id="quantity" aria-describedby="category" placeholder="Enter category">
                    </div>
                    <div class="form-group ">
                        <label for="category_id my-2">Category Name</label>
                        <select class="form-control" name="product_category_id" id="category_id">
                          <option value="">Select From Category</option>
                          @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="subcategory_id my-2">Sub Category name</label>
                        <select class="form-control" name="product_subcategory_id" id="subcategory_id">
                          <option value="">Select From SubCategory</option>
                          @foreach($SubCategories as $subcategory)
                          <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="image my-2">Product Image</label>
                        <input type="file" class="form-control my-2" name="product_img" id="image" aria-describedby="category" placeholder="Enter category">
                    </div>
                  <button type="submit" class="btn btn-success my-2">Add Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection

