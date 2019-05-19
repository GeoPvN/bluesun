<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $orders = Order::where('user_id', $user_id)->get();

        return response($orders);
    }
}
