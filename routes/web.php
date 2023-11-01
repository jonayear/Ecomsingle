<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user_template.layouts.layouts');
// });
// User Controller
Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/Category-page/{id}/{slug}','CategoryPage')->name('Category');
    Route::get('/Single-product/{id}/{slug}','SingleProduct')->name('single-product');
    Route::get('/New-Release','NewRelease')->name('newrelease');

});
Route::middleware(['auth','role:user'])->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/Add-To-Cart','AddToCart')->name('AddToCart');
        Route::post('/Add-Cart/{id}','CartProduct')->name('add.cart');
        Route::get('/delete-Cart/{id}','DeleteProduct')->name('delete.order');
        Route::get('/Check-Out','CheckOut')->name('CheckOut');
        Route::get('/Get-shipping-Address/{totalprice}','GetShippingAddress')->name('getshippingaddress');
        Route::get('/User-Profile','UserProfile')->name('UserProfile');
        Route::get('/Pending-Order','PendingOrder')->name('pending.order');
        Route::get('/History','History')->name('histroy');
        Route::get('/Log-Out','LogOut')->name('logout');
        Route::get('/Today-Deal','ToydayDeal')->name('todaydeal');
        Route::get('/Customer-Service','CustomerService')->name('customerservice');

    });
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/userprofile',[DashbordController::class,'index'])->name('userprofile');

// Authentication Function admin Route
Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(DashbordController::class)->group(function(){
        Route::get('/admin_dashbord','admin_dashbord')->name('dashbord');
    });
    // Category Controller
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/allcategory','index')->name('allcategory');
        Route::get('/addcategory','addcategory')->name('addcategory');
        Route::post('/store_category','storecategory')->name('store.category');
        Route::get('/editcategory/{id}','editcategory')->name('edit.category');
        Route::post('/update_category/{id}','updatecategory')->name('update.category');
        Route::get('/delete_category/{id}','deletecategory')->name('delete.category');
    });
    // subcategory Controller
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/subcategory','index')->name('subcategory');
        Route::get('/addsubcategory','addsubcategory')->name('addsubcategory');
        Route::post('/storesubcategory','storesubcategory')->name('store.subcategory');
        Route::get('/editsubcategory/{id}','editsubcategory')->name('edit.subcategory');
        Route::post('/update_subcategory/{id}','updatesubcategory')->name('update.subcategory');
        Route::get('/delete_subcategory/{id}','deletesubcategory')->name('delete.subcategory');

    });
     // product Controller
    Route::controller(ProductController::class)->group(function(){
        Route::get('/product','index')->name('product');
        Route::get('/addproduct','addproduct')->name('addproduct');
        Route::post('/store_product','storeproduct')->name('store.product');
        Route::get('/editproduct/{id}','editproduct')->name('edit.product');
        Route::post('/update_product/{id}','updateproduct')->name('update.product');
        Route::get('/delete_product/{id}','deleteproduct')->name('delete.product');
    });
    // Order Controller
    Route::controller(OrderController::class)->group(function(){
        Route::get('/pendingorder','index')->name('pendingorder');
    });
});
require __DIR__.'/auth.php';
