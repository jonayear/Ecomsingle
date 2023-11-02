<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function CategoryPage($id){
        $category = Category::findOrfail($id);
        $products = Product::where('product_category_id',$id)->latest()->get();
        return view('user_template.CategoryPage',compact('category','products'));
    }

    public function SingleProduct($id){
        $products = Product::findOrFail($id);
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id',$subcat_id)->latest()->get();
        return view('user_template.SingleProduct',compact('products','related_products'));
    }

    public function AddToCart(){
        $userid = Auth::id();
        $cart_item = Cart::where('user_id',$userid)->get();
        return view('user_template.AddToCart',compact('cart_item'));
    }

    public function CartProduct(Request $request,$id){
        $product = Product::find($id);
        Cart::insert([
            'product_id'=>$product->id,
            'user_id'=>Auth::id(),
            'quantity'=>$request->quantity,
            'price'=>$product->price * $request->quantity,
        ]);
        return redirect()->route('AddToCart')->with('msg','Product Successfully Added To Your Cart');
    }

    public function DeleteProduct($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('AddToCart')->with('msg','Product Successfully Deleted from Your Cart');
    }

    public function GetShippingAddress(){
        return view('user_template.GetShippingAddress');
    }

    public function AddShippingAddress(Request $request){
        $request->validate([
            'phone_no'=>'required',
            'city_name'=>'required',
            'postal_code'=>'required',
        ]);

         ShippingInfo::insert([
            'phone_no'=>$request->phone_no,
            'user_id'=>Auth::id(),
            'city_name'=>$request->city_name,
            'postal_code'=>$request->postal_code,
        ]);
        return redirect()->route('CheckOut')->with('msg','Product Successfully Added To Your Cart');
    }

    public function CheckOut(){
        $userid = Auth::id();
        $cart_item = Cart::where('user_id',$userid)->get();
        $shipping_add = ShippingInfo::where('user_id',$userid)->first();
        return view('user_template.CheckOut',compact('cart_item','shipping_add'));
    }

    public function UserProfile(){
        return view('user_template.UserProfile');
    }

    public function PendingOrder(){
        return view('user_template.PendingOrder');
    }

    public function History(){
        return view('user_template.History');
    }

    public function LogOut(){

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
