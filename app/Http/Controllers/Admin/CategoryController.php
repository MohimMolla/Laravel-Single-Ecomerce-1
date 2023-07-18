<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('Admin.Category.allcategory');
    }
    public function addcategory()
    {
        return view('Admin.Category.addcategory');
    }
}
