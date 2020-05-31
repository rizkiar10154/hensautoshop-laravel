<?php

namespace App\Http\Controllers\Hensautoshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //


    public function index()
    {
        return view('hensautoshop.index');
    }
    public function daftar()
    {
        return view('hensautoshop.daftar');
    }
    public function contact()
    {
        return view('hensautoshop.contact');
    }
}
