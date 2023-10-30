<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $SubCategories = SubCategory::all();
        return view('admin.subcategory',compact('SubCategories'));
    }
    // show Add Sub Category
    public function addsubcategory(){
        $categories = Category::all();
        return view('admin.addsubcategory',compact('categories'));
    }

    // store storesubcategory
    public function storesubcategory(Request $request){
        $request->validate([
            'subcategory_name'=>'required|unique:sub_categories',
            'category_id'=>'required'
        ]);
        $category_id = $request->category_id;
        // getting category name
        $category_name = Category::where('id',$category_id)->value('category_name');

        SubCategory::insert([
            'subcategory_name'=>$request->subcategory_name,
            'category_name'=> $category_name,
            'category_id'=>$category_id,
            'slug'=> strtolower(str_replace('','-',$request->subcategory_name))
        ]);
        Category::where('id',$category_id)->increment('subcategory_count',1);
        return redirect()->route('subcategory')->with('msg','SubCategory added successfully');
    }

    // Show Editsubcategory page
    public function editsubcategory($id){
        $SubCategories = SubCategory::findOrfail($id);
        return view('admin.editsubcategory',compact('SubCategories'));
    }
    // updatesubcategory function
    public function updatesubcategory(Request $request,$id){
        $request->validate([
            'subcategory_name'=>'required|unique:sub_categories'
        ]);

        SubCategory::where('id',$id)->update([
            'subcategory_name'=>$request->subcategory_name,
            'slug'=> strtolower(str_replace('','-',$request->subcategory_name))
        ]);
        return redirect()->route('subcategory')->with('msg','SubCategory Updated successfully');
    }

    // Delete subcategory
    public function deletesubcategory($id){
        $cat_id = SubCategory::where('id',$id)->value('category_id');
        SubCategory::findOrfail($id)->delete();
        Category::where('id',$cat_id)->decrement('subcategory_count',1);
        return redirect()->route('subcategory')->with('msg','SubCategory Deleted successfully');
    }

}
