<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

	// All Product Show start
	public function index()
	{
		$products = Product::all();
		return view('Admin.Product.allproduct', compact('products'));
	}
	// All Product Show end

	// Addproduct Product  start
	public function addproduct()
	{
		$catogory = Category::all();
		$sub_cat = Subcategory::all();


		return view('Admin.Product.addproduct', compact('catogory', 'sub_cat'));
	}
	// Addproduct Product  end

	// Storeproduct Product Show start
	public function storeproduct(Request $request)
	{
		$request->validate([
			'product_name' => 'required|unique:products',
			'product_tittle' => 'required',
			'product_description' => 'required',
			'price' => 'required',
			'quantity' => 'required',
			'product_category_id' => 'required',
			'product_subcategory_id' => 'required',
			'product_image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		// $image = $request->file('product_image');
		// $image_name = time().'-'.$image->getClientOriginalExtension();
		// $image->move(public_path('productimage'), $image_name);
		// ..........................
		$image = $request->file('product_image');
		$image_name = time() . '.' . $image->getClientOriginalExtension();
		$image->move(public_path('productimage'), $image_name);
		// ..........................

		$category_id = $request->product_category_id;
		$subcat_id = $request->product_subcategory_id;
		$cat_name = Category::where('id', $category_id)->value('category_name');
		$subcat_name = Subcategory::where('id', $subcat_id)->value('subcategory_name');

		Product::insert([
			'product_name' => $request->product_name,
			'product_tittle' => $request->product_tittle,
			'product_description' => $request->product_description,
			'price' => $request->price,
			'quantity' => $request->quantity,
			'product_image' => $image_name, // Save the image name, not the file object
			'product_category_name' => $cat_name, // Set the category name
			'product_category_id' => $category_id,
			'product_subcategory_name' => $subcat_name, // Set the subcategory name
			'product_subcategory_id' => $subcat_id,
			'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
		]);

		Category::where('id', $category_id)->increment('product_count', 1);
		Subcategory::where('id', $subcat_id)->increment('product_count', 1);

		return redirect()->route('allproduct')->with('message', 'Product added successfully');
	}
	// Storeproduct Product  end


	// Edit Product image   Start

	public function editproductimage($id)
	{
		$p_img = Product::findOrFail($id);
		return view('Admin.Product.editproductimg', compact('p_img'));
	}
	public function updateproductimage(Request $request)
	{
		$request->validate([
			'product_image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

	$id= $request->id;
		$image = $request->file('product_image');
		$image_name = time() . '.' . $image->getClientOriginalExtension();
		$image->move(public_path('productimage'), $image_name);
		// Product::findOrFail($id)->update(['product_image' =>$image]);
		Product::findOrFail($id)->update(['product_image' => $image_name]);

		return redirect()->route('allproduct')->with('message', 'Product Image update successfully');

	}
		// Edit Product image   end

		// Edit Product    Start
	public function editproduct($id) {
$p_info = Product::findOrFail($id);
$categories = Category::all();
$subcategories = Subcategory::all();

return view('Admin.Product.editproduct', compact('p_info', 'categories', 'subcategories'));


	}
		// Edit Product image   end

		//Upadte Product image   Start

	public function updateproduct(Request $request){
		$product_id = $request->id;
		$request->validate([
			'product_name' => 'required|unique:products,product_name,'. $product_id,
			'product_tittle' => 'required',
			'product_description' => 'required',
			'price' => 'required',
			'quantity' => 'required',
			'product_category_id' => 'required',
			'product_subcategory_id' => 'required',
			
		]);
		$category_id = $request->product_category_id;
		$subcat_id = $request->product_subcategory_id;
		$cat_name = Category::where('id', $category_id)->value('category_name');
		$subcat_name = Subcategory::where('id', $subcat_id)->value('subcategory_name');

		Product::findOrFail($product_id)->update([
			'product_name' => $request->product_name,
			'product_tittle' => $request->product_tittle,
			'product_description' => $request->product_description,
			'price' => $request->price,
			'quantity' => $request->quantity,
			
			'product_category_name' => $cat_name, // Set the category name
			'product_category_id' => $category_id,
			'product_subcategory_name' => $subcat_name, // Set the subcategory name
			'product_subcategory_id' => $subcat_id,
			'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
		]);
		return redirect()->route('allproduct')->with('message', 'Product Image update successfully');

	}
	//Upadte Product image   end

	public function deletproduct($id) {
		Product::findOrFail($id)->delete();
		
	}

}
