<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
					return view('user_templete.category');
				}
				public function singleproduct(){
					return view('user_templete.single');
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
