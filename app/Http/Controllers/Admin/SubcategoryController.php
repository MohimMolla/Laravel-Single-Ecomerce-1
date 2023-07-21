<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
  public function index()
  {
    $subcategories = Subcategory::all();
    return view('Admin.Subcategory.allsubcategory', compact('subcategories'));
  }
  public function addsubcategory()
  {
    $categories = Category::all();

    return view('Admin.Subcategory.addsubcategory', compact('categories'));
  }
  public function storesubcategory(Request $request)
  {
    $request->validate([
      'subcategory_name' => 'required|unique:subcategories',
      'category_id' => 'required',
    ]);
    $categories_id = $request->category_id;
    $categories_name = Category::where('id', $categories_id)->value('category_name');

    // $categories_name= Category::where('id',$categories_id)->pluck('category_name','category_id');

    Subcategory::insert([
      'subcategory_name' => $request->subcategory_name,
      'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
      'category_id' =>  $categories_id,
      'category_name' => $categories_name,
    ]);
    Category::where('id', $categories_id)->increment('subcategory_count');

    return redirect()->route('allsubcategory')->with('message', 'Subcategory added successfully');
  }
  public function editsubcategory($id)
  {
    $subcat_info = Subcategory::findOrFail($id);
    $categories = Category::all(); // Fetch all categories to populate the dropdown

    return view('Admin.Subcategory.editsubcategory', compact('subcat_info', 'categories'));
  }

  public function updatesubcategory(Request $request)
  {
    $request->validate([
      'subcategory_name' => 'required|unique:subcategories,
    
      subcategory_name,' . $request->input('subcatid'),
      'category_id' => 'required',
    ]);
      //if i want to update a category then i use this code

    $categories_id = $request->category_id;
    $categories_name = Category::where('id', $categories_id)->value('category_name');

    $subcat_id = $request->input('subcatid');
    $subcategory = Subcategory::findOrFail($subcat_id);

    $subcategory->update([
      'subcategory_name' => $request->input('subcategory_name'),
      'slug' => strtolower(str_replace(' ', '-', $request->input('subcategory_name'))),
      'category_id' => $categories_id,
      'category_name' => $categories_name,
    ]);

    return redirect()->route('allsubcategory')->with('message', 'Subcategory updated successfully');
  }
  public function deletesubcategory($id,)
  {
    $cat_id = Subcategory::where('id', $id)->value('category_id');
    Subcategory::findOrFail($id)->delete();

    Category::where('id', $cat_id)->decrement('subcategory_count', 1);




    return redirect()->route('allsubcategory')->with('message', 'Subcategory Delet successfully');
  }
}
