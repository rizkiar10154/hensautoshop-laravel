<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\KategoriRequest;
use App\Kategori;
use App\Rekomendasi;
use App\RiwayatHenspay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;


class RiwayatHensPayController extends Controller
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
        $riwayat_list =  RiwayatHenspay::all();

        return view('admin.riwayat_henspay.index', compact('riwayat_list'));
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Riwayat = RiwayatHenspay::findOrFail($id);


        return view('admin.detailorder.index', compact('order'));
    }
}
