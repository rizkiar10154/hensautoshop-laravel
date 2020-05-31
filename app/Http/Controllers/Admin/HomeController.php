<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Profit;
use App\Brand;
use App\Saldo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();

        $saldo = Saldo::all()->first();

        $order = Order::all();

        $order_list = Order::orderBy('updated_at', 'desc')->take(5)->get();

        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;

        $penghasilanHariIni = Profit::where('status', 'sukses')
            ->whereDate('created_at', '=', $now)
            ->get();

        $penghasilanBulanIni = Profit::where('status', 'sukses')
            ->whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->get();


        return view('admin.index', compact('brand', 'saldo', 'order', 'order_list', 'penghasilanHariIni', 'penghasilanBulanIni'));
    }
}
