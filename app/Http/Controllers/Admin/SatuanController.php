<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SatuanRequest;
use App\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class SatuanController extends Controller
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
        $satuan_list =  Satuan::all();

        return view ('admin.satuan.index',compact('satuan_list'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.satuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SatuanRequest $request)
    {
        //
        $data  = $request->all();
        Satuan::create($data);

        Session::flash('flash_message','Tambah Data Berhasil');
        return redirect('admin/satuan/create');

    }








}
