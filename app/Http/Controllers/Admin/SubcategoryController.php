<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
  public function index(){
    return view('Admin.Subcategory.allsubcategory');
  }
  public function addsubcategory(){
    return view('Admin.Subcategory.addsubcategory');
  }
}
