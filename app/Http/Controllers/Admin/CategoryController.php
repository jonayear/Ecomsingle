<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::latest()->get();
        return view('admin.category',compact('category'));
    }
    public function addcategory(){
        return view('admin.addcategory');
    }
    // add Category
    public function storecategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        Category::insert([
            'category_name'=> $request->category_name,
            'slug'=> strtolower(str_replace('','-',$request->category_name))
        ]);
        return redirect()->route('allcategory')->with('msg','Category added successfully');
    }
    //Show edit category page
    public function editcategory($id){
        $category= Category::findOrfail($id);
        return view('admin.editcategory',compact('category'));
    }

    // update Category
    public function updatecategory(Request $request,$id){
        $category= Category::findOrfail($id);
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        Category::where('id',$id)->update([
            'category_name'=> $request->category_name,
            'slug'=> strtolower(str_replace('','-',$request->category_name))
        ]);
        return redirect()->route('allcategory')->with('msg','Category Updated successfully');
    }
    // Delete category
    public function deletecategory($id){
        Category::findOrfail($id)->delete();
        return redirect()->route('allcategory')->with('msg','Category deleted successfully');
    }
}
