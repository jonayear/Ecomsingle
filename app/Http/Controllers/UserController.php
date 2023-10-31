<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function CategoryPage($id){
        $category = Category::findOrfail($id);
        $products = Product::where('product_category_id',$id)->latest()->get();
        return view('user_template.CategoryPage',compact('category','products'));
    }

    public function SingleProduct($id){
        $products = Product::findOrFail($id);
        return view('user_template.SingleProduct');
    }

    public function AddToCart(){
        return view('user_template.AddToCart');
    }

    public function CheckOut(){
        return view('user_template.CheckOut');
    }

    public function UserProfile(){
        return view('user_template.UserProfile');
    }

    public function NewRelease(){
        return view('user_template.NewRelease');
    }

    public function ToydayDeal(){
        return view('user_template.ToydayDeal');
    }

    public function CustomerService(){
        return view('user_template.CustomerService');
    }
}
