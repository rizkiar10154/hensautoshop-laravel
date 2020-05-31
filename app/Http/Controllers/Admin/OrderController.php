<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function index()
    {
        //
        $order_list =  Order::all();

        return view ('admin.order.index',compact('order_list'));

    }
}
