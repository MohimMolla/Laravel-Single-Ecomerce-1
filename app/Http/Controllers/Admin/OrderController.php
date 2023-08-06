<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $pending_orders = Order::where('status', 'pending')->get();

        return view('Admin.Order.pendingorder', compact('pending_orders'));
    }
}
