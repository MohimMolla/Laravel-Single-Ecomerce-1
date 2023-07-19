<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        // $cat= Category:: all();
        // return view('Admin.Category.allcategory',['categories' => $cat]);
        $cat = Category::all();
        return view('Admin.Category.allcategory',compact('cat'));
    }
    public function addcategory()
    {
        return view('Admin.Category.addcategory');
    }
    public function storecategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories',            
        ]);
        $cat= Category::insert([
            'category_name'=>$request->category_name,
            'slug'=>strtolower(str_replace(' ','-',$request->category_name))
        ]);
       
        return redirect()->route('allcategory')->with('message','Catogery add successfully');
    }
}
