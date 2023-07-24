<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
	public function index($id)
	{
		$category = Category::findOrFail($id);

		$products = Product::where('product_category_id', $id)->latest()->get();
		return view('user_templete.category', compact('category', 'products'));
	}
	public function singleproduct($id)
	{
		$products = Product::findOrFail($id);
		$subcat_id = Product::where('id', $id)->value('product_subcategory_id');
		$releted_product = Product::where('product_subcategory_id', $subcat_id)->latest()->get();

		return view('user_templete.single', compact('products', 'releted_product'));
	}

	// Add to cart
	public function addtocart()
	{
					$user_id = Auth::id();
	
					// Get user's cart items
					$user_items = Cart::where('user_id', $user_id)->get();
	
					// Fetching product names and images for the products in the cart
					$product_details = [];
					foreach ($user_items as $item) {
									// Fetch the corresponding product name for each cart item
									$product_name = Product::where('id', $item->product_id)->value('product_name');
									$product_image = Product::where('id', $item->product_id)->value('product_image');
	
									if ($product_name) {
													// Calculate the total price for the cart item
													$price = $item->price * $item->quantity;
	
													// Add the product details (name, image, quantity, price) to the $product_details array
													$product_details[] = [
																	'name' => $product_name,
																	'image' => $product_image,
																	'quantity' => $item->quantity,
																	'price' => $price,
													];
									}
					}
	
					return view('user_templete.addtocart', compact('product_details'));
	}
	
	
	

	
	public function checkout()
	{
		return view('user_templete.checkout');
	}
	public function userprofile()
	{
		return view('user_templete.userprofile');
	}

		// pending orders
	public function pendingsorders()
	{
		return view('user_templete.pendingsorders');
	}


	// Add to cart
	public function addproducttocart(Request $request){
		$product_price = $request->price;
		$quantity = $request->quantity;
		$price = $product_price * $quantity;
		cart::insert([
						'product_id' => $request->product_id,
						'user_id' => Auth::id(),
						'quantity' => $request->quantity,
						'price' => $price, // Replace $productPrice with the actual price of the product
					

		]);
		return redirect()->route('addtocart')->with('message','Your product has been added add to the cart');
}



		// History
		public function history()
	{
		return view('user_templete.history');
	}

	public function newrelease()
	{
		return view('user_templete.newrelease');
	}
	public function todaysdeal()
	{
		return view('user_templete.todaysdeal');
	}
	public function customservice()
	{
		return view('user_templete.customservice');
	}
}
