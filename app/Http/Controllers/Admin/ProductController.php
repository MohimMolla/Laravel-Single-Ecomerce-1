<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function index(){
		return view('Admin.Product.allproduct');
	}
	public function addproduct(){
		return view('Admin.Product.addproduct');
	}
    
}
