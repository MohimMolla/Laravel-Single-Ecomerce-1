<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index($id){
     $category = Category::findOrFail($id);
					$products = Product::where('product_category_id', $id)->latest()->get();
					return view('user_templete.category', compact('category', 'products'));
				}
				public function singleproduct($id){
					$products = Product::findOrFail($id);
					
					return view('user_templete.single', compact('products'));
				}
				public function addtocart(){
					return view('user_templete.addtocart');
				}
				public function checkout(){
					return view('user_templete.checkout');
				}
				public function userprofile(){
					return view('user_templete.userprofile');
				}
				public function newrelease(){
					return view('user_templete.newrelease');
				}
				public function todaysdeal(){
					return view('user_templete.todaysdeal');
				}
				public function customservice(){
					return view('user_templete.customservice');
				}
}
