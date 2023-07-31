<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ClientController;
use App\Http\Controllers\User\HomeController;
use Faker\Guesser\Name;
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
//     return view('welcome');
// Route::get('/', function () {
//     return view('user_templete.layouts.templete');
//  });
// Route::get('/', [DashbordController::class,'index']);
Route::get('/admin', [DashbordController::class,'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin route start
// Route::get('/userprofile', [DashbordController::class,'index'])->name('userprofile');
// admin route end
// Admin Controller group Routing start
Route::controller(DashbordController::class)->group(function(){
    Route::get('/admin/dashboard', 'index');
    // Route::get('/userdashboard', 'dashboard');
});

// Category  Controller start
Route::controller(CategoryController::class)->group(function(){
    Route::get('/admin/all-category', 'index')->name('allcategory');
    Route::get('/admin/add-category', 'addcategory')->name('addcategory');
    Route::post('/admin/store-category', 'storecategory')->name('storecategory');
    Route::get('/admin/edit-category/{id}', 'editcategory')->name('editcategory');
    Route::post('/admin/update-category', 'updatecategory')->name('updatecategory');
    Route::get('/admin/delet-category/{id}', 'deletecategory')->name('deletecategory');    
});
// Category  Controller end

// Subcategory Controller start
Route::controller(SubcategoryController::class)->group(function(){
    Route::get('/admin/all-subcategory', 'index')->name('allsubcategory');
    Route::get('/admin/add-subcategory', 'addsubcategory')->name('addsubcategory');    
    Route::post('/admin/store-subcategory', 'storesubcategory')->name('storesubcategory');    
    Route::get('/admin/edit-subcategory/{id}', 'editsubcategory')->name('editsubcategory');    
    Route::get('/admin/delet-subcategory/{id}', 'deletesubcategory')->name('deletesubcategory');    
    Route::post('/admin/update-subcategory', 'updatesubcategory')->name('updatesubcategory');    
});
// Subcategory Controller end


//Product Controller start
Route::controller(ProductController::class)->group(function(){
    Route::get('/admin/all-product', 'index')->name('allproduct');
    Route::get('/admin/add-product', 'addproduct')->name('addproduct');
    Route::post('/admin/store-product', 'storeproduct')->name('storeproduct');
    Route::get('/admin/edit-product-image/{id}', 'editproductimage')->name('editproductimage');
    Route::post('/admin/update-product-image', 'updateproductimage')->name('updateproductimage');
    Route::get('/admin/edit-product/{id}', 'editproduct')->name('editproduct');
    Route::post('/admin/update-product', 'updateproduct')->name('updateproduct');
    Route::get('/admin/delet-product/{id}', 'deletproduct')->name('deletproduct');
    
});
//Product Controller end

Route::controller(OrderController::class)->group(function(){
    Route::get('/admin/pending-order', 'index')->name('pendingorder');
    
    
});
// Controller group Routing end

// User Controller group Routing start


// Home Controller Controller group Routing start

Route::controller(HomeController::class)->group(function(){
 Route::get('/', 'index')->name('Home');
});
// Home Controller Controller group Routing End


// Client Controller  group Routing start
Route::controller(ClientController::class)->group(function(){
    // Route::get('/category/{id}/{slug}', 'index')->name('category');
    Route::get('/category/{id}/{slug}', 'index')->name('category');

    Route::get('/single-product/{id}/{slug}', 'singleproduct')->name('singleproduct');
    Route::get('/add-to-cart', 'addtocart')->name('addtocart');
    Route::post('/add-product-to-cart', 'addproducttocart')->name('addproducttocart');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/user-profile', 'userprofile')->name('userprofile');
    Route::get('/user-profile/pendings-order', 'pendingsorders')->name('pendingsorders');
    Route::get('/user-profile/history', 'history')->name('history');
    Route::get('/new-release', 'newrelease')->name('newrelease');
    Route::get('/todayes-deal', 'todaysdeal')->name('todaysdeal');
    Route::get('/custom-service', 'customservice')->name('customservice');
    Route::get('/admin/remove-card-item/{id}', 'removeitem')->name('removeitem');
});

// User Controller group Routing end

require __DIR__.'/auth.php';
