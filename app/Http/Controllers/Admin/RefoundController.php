<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\KategoriRequest;
use App\Http\Requests\TopUpRequest;
use App\Kategori;
use App\Konsumen;
use App\Brand;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Session;
use App\RiwayatRestopay;

class RefoundController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view('admin.refound');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.refound');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopUpRequest $request)
    {
        //
        $data  = $request->all();
        $value = $request->value;
        $tipe = $request->tipe;
        $konfirmasi_value = $request->konfirmasi_value;
        $phone_number = $request->phone_number;

        if ($tipe == "Brand") {
            $brand = Brand::where('brand_phone', $phone_number)->first();

            if ($brand) {

                if ($value != $konfirmasi_value) {
                    Session::flash('flash_error', 'Brand Tidak Ditemukan');
                    Session::flash('penting', true);
                    return redirect('admin/refound')->withInput();
                } else {
                    $nama = $brand->brand_nama;
                    $succes = true;
                    return view('admin.refound_konfirmasi', compact('nama', 'succes', 'value', 'phone_number', 'tipe'));
                }
            } else {
                Session::flash('flash_error', 'Brand Tidak Ditemukan');
                Session::flash('penting', true);
                return redirect('admin/refound')->withInput();
            }
        }

        if ($tipe == "Konsumen") {
            $konsumen = Konsumen::where('konsumen_phone', $phone_number)->first();
            if ($konsumen) {
                if ($value != $konfirmasi_value) {
                    Session::flash('flash_error', 'Nominal Tidak Sama');
                    Session::flash('penting', true);
                    return redirect('admin/refound')->withInput();
                } else {
                    $nama = $konsumen->konsumen_nama;
                    $succes = true;
                    return view('admin.refound_konfirmasi', compact('nama', 'succes', 'value', 'phone_number', 'konfirmasi_value', 'tipe'));
                }
            } else {
                Session::flash('flash_error', 'Konsumen Tidak Ditemukan');
                Session::flash('penting', true);
                return redirect('admin/refound')->withInput();
            }
        }








        //        Session::flash('flash_message','Tambah Data Berhasil');
        //        return redirect('admin/kategori/create');

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function konfirmasi(Request $request)
    {
        //

        $tipe = $request->tipe;
        $value = $request->value;
        $phone_number = $request->phone_number;

        if ($tipe == "Brand") {
            $brand = Brand::where('brand_phone', $phone_number)->first();

            if ($brand) {

                $refound = $brand->brand_balance - $value;

                $update = $brand->update(array('brand_balance' => $refound));

                if ($update) {
                    Session::flash('flash_message', 'Berhasil Refound');

                    $insertHistory = RiwayatRestopay::create([
                        'penerima_id' => $brand->id,
                        'penerima_phone' => $brand->brand_phone,
                        'nominal' => $request->value,
                        'jenis_transaksi' => 'refound',
                        'penerima_tipe' => 'brand',
                        'pengirim_id' => $request->id,
                        'pengirim_tipe' => 'admin',
                    ]);


                    return redirect('admin/refound');
                } else {
                    Session::flash('flash_error', 'Gagal Refound');
                    Session::flash('penting', true);
                    return redirect('admin/konfirmasi')->withInput();
                }
            } else {
                Session::flash('flash_error', 'Refound Gagal');
                Session::flash('penting', true);
                return redirect('admin/konfirmasi')->withInput();
            }
        }

        if ($tipe == "Konsumen") {
            $konsumen = Konsumen::where('konsumen_phone', $phone_number)->first();
            if ($konsumen) {
                $refound = $konsumen->konsumen_balance - $value;

                $update = $konsumen->update(array('konsumen_balance' => $refound));

                if ($update) {
                    Session::flash('flash_message', 'Berhasil Refound');

                    $insertHistory = RiwayatRestopay::create([
                        'penerima_id' => $konsumen->id,
                        'penerima_phone' => $konsumen->konsumen_phone,
                        'nominal' => $request->value,
                        'jenis_transaksi' => 'refound',
                        'penerima_tipe' => 'konsumen',
                        'pengirim_id' => $request->id,
                        'pengirim_tipe' => 'admin',
                    ]);

                    return redirect('admin/refound');
                } else {
                    Session::flash('flash_error', 'Gagal Refound');
                    Session::flash('penting', true);
                    return redirect('admin/konfirmasi')->withInput();
                }
            } else {
                Session::flash('flash_error', 'Refound Gagal');
                Session::flash('penting', true);
                return redirect('admin/konfirmasi')->withInput();
            }
        }
    }
}
