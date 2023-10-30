<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function CategoryPage(){
        return view('user_template.CategoryPage');
    }

    public function SingleProduct(){
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
