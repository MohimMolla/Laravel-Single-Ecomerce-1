<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allproducts = Product::all();
        return view('user_templete.home', compact('allproducts'));
    }
}
