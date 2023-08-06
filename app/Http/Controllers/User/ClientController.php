<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shippinginfo;
use GuzzleHttp\Psr7\Message;
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

<<<<<<< HEAD
	// add product to cart
	// public function addproducttocart(Request $request)
	// {
	// 	$produc_price = $request->price;
	// 	$quantity = $request->quantity;
	// 	$price = $produc_price * $quantity;
	// 	Cart::insert([
	// 		'product_id' => $request->product_id,
	// 		'user_id' => Auth::id(),
	// 		'quantity'=>$request->quantity,
	// 		'price'=>$price,

	// 	]);
	// 	return redirect()->route('addtocart')->with('message', 'Your Item has been add Successfully');
	// }
	public function addproducttocart(Request $request)
	{
		$product = Product::findOrFail($request->product_id);
		$quantity = $request->quantity;
		$price = $product->price * $quantity;


		Cart::insert([
			'product_id' => $request->product_id,
			'user_id' => Auth::id(),
			'quantity' => $quantity,
			'price' => $price,
		]);

		return redirect()->route('addtocart')->with('message', 'Your Item has been added Successfully');
	}


	//Add to cart

	public function addtocart()
	{
		$user_id = Auth::id();
		$cart_item = Cart::Where('user_id', $user_id)->get();

		// $product = Product::where('id', $cart_item)->value([
		// 	'product_name', 'product_image',
		// ]);
		// $product = Product::where('id', $cart_item)->get();
		// $cart_item->load('products');
		// $product = [];
		//   foreach ($cart_item as $item) {
		//       $product[] = Product::find($item->product_id);
		//   }

		return view('user_templete.addtocart', compact('cart_item'));
	}

	//remove cart item
	public function removeitem($id)
	{
		Cart::find($id)->delete();
		return redirect()->back()->with('message', 'Your Cart Item Removed Successfully');
	}

	// Shipping address 
	public function shippingaddress()
	{
		return view('user_templete.shippingaddress');
	}

	// Add Shipping Address
	public function storeshippingaddress(Request $request)
	{
		Shippinginfo::insert([
			'user_id' => Auth::id(),
			'phone_number' => $request->phone_number,
			'city_name' => $request->city_name,
			'postal_code' => $request->postal_code,
		]);
		return redirect()->route('checkout');
	}


	public function checkout()
	{
		$user_id = Auth::id();
		$cart_item = Cart::where('user_id', $user_id)->get();
		$shipping_item = Shippinginfo::where('user_id', $user_id)->first();

		return view('user_templete.checkout', compact('cart_item', 'shipping_item'));
=======
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
	// Remove item
	public function removeitem($id){
		Cart::findOrFaail($id)->delete();

		return redirect()-route('addtocart');
	}
	
	

	
	public function checkout()
	{
		return view('user_templete.checkout');
>>>>>>> 18403d30108a3db55e181f434248fd96dad76df6
	}
	public function userprofile()
	{
		return view('user_templete.userprofile');
	}

<<<<<<< HEAD
	//place order
	public function placeorder()
	{
		$user_id = Auth::id();
		$shipping_item = Shippinginfo::where('user_id', $user_id)->first();
		$cart_item = Cart::where('user_id', $user_id)->get();
 foreach($cart_item as $items){
		Order::insert([
			'user_id'=>$user_id,
			'shipping_phoneNumber'=>$shipping_item->phone_number,
			'shipping_city'=>$shipping_item->city_name,
			'shipping_postalcode'=>$shipping_item->postal_code,
			'product_id'=>$items->product_id,
			'quantity'=>$items->quantity,
			'total_price'=>$items->price,
		
		]);
		$id = $items->id;
		Cart::findOrFail($id)->delete();
	}
	$shipping_item = Shippinginfo::where('user_id', $user_id)->first()->delete();
	return redirect()->route('pendingsorders')->with('message','your Pending Order Has been Placed Successfully');

	}

	//cancel order


	// pending orders
	public function pendingsorders()
	{
		$pending_orders = Order::where('status', 'pending')->get();
		return view('user_templete.pendingsorders', compact('pending_orders'));
	}
	// History
	public function history()
=======
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
>>>>>>> 18403d30108a3db55e181f434248fd96dad76df6
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
