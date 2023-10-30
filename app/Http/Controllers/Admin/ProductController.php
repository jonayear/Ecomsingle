<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\getClientOriginalExtension;
use File;

class ProductController extends Controller
{
    public function index(){
        $Products = Product::all();
        return view('admin.product',compact('Products'));
    }

    public function addproduct(){
        $categories = Category::all();
        $SubCategories = SubCategory::all();
        return view('admin.addproduct',compact('categories','SubCategories'));
    }

    public function storeproduct(Request $request){
        $request->validate([
            'product_name'=>'required|unique:products',
            'product_short_des'=>'required',
            'product_long_des'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'product_category_id'=>'required',
            'product_subcategory_id'=>'required',
            'product_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // getting category name & id
        $category_id = $request->product_category_id;
        $category_name = Category::where('id',$category_id)->value('category_name');
        // getting subcategory name & id
        $subcategory_id = $request->product_subcategory_id;
        $subcategory_name = SubCategory::where('id',$subcategory_id)->value('subcategory_name');

        // Image upload
        $imageName="";
        if ($image=$request->file('product_img')) {
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('product_img',$imageName);
        }
        Product::insert([
            'product_name'=>$request->product_name,
            'product_short_des'=>$request->product_short_des,
            'product_long_des'=>$request->product_long_des,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'product_subcategory_id'=>$subcategory_id,
            'product_subcategory_name'=>$subcategory_name,
            'product_category_name'=> $category_name,
            'product_category_id'=>$category_id,
            'product_img'=>$imageName,
            'slug'=> strtolower(str_replace('','-',$request->product_name))
        ]);
        Category::where('id',$category_id)->increment('product_count',1);
        SubCategory::where('id',$subcategory_id)->increment('product_count',1);
        return redirect()->route('product')->with('msg','Product added successfully');
    }
    // show edit page
    public function editproduct($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $SubCategories = SubCategory::all();
        return view('admin.editproduct',compact('product','categories','SubCategories'));
    }
    // updateproduct
    public function updateproduct(Request $request,$id){
        $product = Product::findOrFail($id);
        $category_id = $request->product_category_id;
        $category_name = Category::where('id',$category_id)->value('category_name');
        // getting subcategory name & id
        $subcategory_id = $request->product_subcategory_id;
        $subcategory_name = SubCategory::where('id',$subcategory_id)->value('subcategory_name');
         $imageName="";
         $deleteOldImage='/product_img'.$product->product_img;
        if ($image=$request->file('product_img')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('product_img',$imageName);
        }else{
                $imageName=$product->product_img;
            }
        Product::where('id',$id)->update([
            'product_name'=>$request->product_name,
            'product_short_des'=>$request->product_short_des,
            'product_long_des'=>$request->product_long_des,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'product_subcategory_id'=>$subcategory_id,
            'product_subcategory_name'=>$subcategory_name,
            'product_category_name'=> $category_name,
            'product_category_id'=>$category_id,
            'product_img'=>$imageName,
            'slug'=> strtolower(str_replace('','-',$request->product_name))
        ]);
        return redirect()->route('product')->with('msg','Product Updated successfully');
    }
    // delete Product
    public function deleteproduct($id){
        $cat_id = Product::where('id',$id)->value('product_category_id');
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');
        Product::findOrFail($id)->delete();
        Category::where('id',$cat_id)->decrement('product_count',1);
        SubCategory::where('id',$subcat_id)->decrement('product_count',1);
        return redirect()->route('product')->with('msg','Product Deleted successfully');
    }
}
