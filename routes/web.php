<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\ProfileController;
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
// });
Route::get('/', [DashbordController::class,'index']);


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
// Controller group Routing start
Route::controller(DashbordController::class)->group(function(){
    Route::get('/admin/dashboard', 'index');
    // Route::get('/userdashboard', 'dashboard');
});
Route::controller(CategoryController::class)->group(function(){
    Route::get('/admin/all-category', 'index')->name('allcategory');
    Route::get('/admin/add-category', 'addcategory')->name('addcategory');
    Route::post('/admin/store-category', 'storecategory')->name('storecategory');
    
});
Route::controller(SubcategoryController::class)->group(function(){
    Route::get('/admin/all-subcategory', 'index')->name('allsubcategory');
    Route::get('/admin/add-subcategory', 'addsubcategory')->name('addsubcategory');    
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/admin/all-product', 'index')->name('allproduct');
    Route::get('/admin/add-product', 'addproduct')->name('addproduct');
    
});

Route::controller(OrderController::class)->group(function(){
    Route::get('/admin/pending-order', 'index')->name('pendingorder');
    
    
});
// Controller group Routing end

require __DIR__.'/auth.php';
