<?php

namespace App\Http\Controllers\Admin;

use App\Hubungan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KontakController extends Controller
{
    //
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pesan_list =  Hubungan::all();

        return view ('admin.kontak.index',compact('pesan_list'));

    }

}
