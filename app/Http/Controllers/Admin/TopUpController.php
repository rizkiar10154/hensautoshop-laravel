<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\KategoriRequest;
use App\Http\Requests\TopUpRequest;
use App\Kategori;
use App\Konsumen;
use App\Brand;
use App\RiwayatHenspay;
use Illuminate\Http\Request;
use App\Push;
use App\Firebase;
use Illuminate\Support\Facades\Session as s;
use App\Http\Controllers\Controller;
use Session;

class TopUpController extends Controller
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


        return view('admin.topup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.topup');
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


        if ($request->tipe == "Brand") {
            $brand = Brand::where('brand_phone', $request->phone_number)->first();

            if ($brand) {

                if ($request->value != $request->konfirmasi_value) {
                    Session::flash('flash_error', 'Nominal Tidak Sama');
                    Session::flash('penting', true);
                    return redirect('admin/topup')->withInput();
                } else {
                    $updateBrand = $brand->update(array('brand_balance' => $brand->brand_balance + $request->value));
                    Session::flash('flash_message', 'Berhasil Melakukan Top Up');



                    $insertHistory = RiwayatHenspay::create([
                        'penerima_id' => $brand->id,
                        'penerima_phone' => $brand->brand_phone,
                        'nominal' => $request->value,
                        'jenis_transaksi' => 'topup',
                        'penerima_tipe' => 'brand',
                        'pengirim_id' => $request->id,
                        'pengirim_tipe' => 'admin',
                    ]);


                    $title = "Top Up Saldo";

                    $message = "Saldo Anda telah ditambah Rp." . $request->value;
                    $push = new Push($title, $message);

                    //get push
                    $pushNotification = $push->getPush();

                    $deviceToken =   Brand::where('brand_phone', $request->phone_number)->pluck('token')->toArray();

                    $firebase = new Firebase();
                    $msg = $firebase->send($deviceToken, $pushNotification);

                    return redirect('admin/topup');
                }
            } else {
                Session::flash('flash_error', 'Brand Tidak Ditemukan');
                Session::flash('penting', true);
                return redirect('admin/topup')->withInput();
            }
        }

        if ($request->tipe == "Konsumen") {
            $konsumen = Konsumen::where('konsumen_phone', $request->phone_number)->first();
            if ($konsumen) {
                if ($request->value != $request->konfirmasi_value) {
                    Session::flash('flash_error', 'Nominal Tidak Sama');
                    Session::flash('penting', true);
                    return redirect('admin/topup')->withInput();
                } else {
                    $updateKonsumen = $konsumen->update(array('konsumen_balance' => $konsumen->konsumen_balance + $request->value));
                    Session::flash('flash_message', 'Berhasil Melakukan Top Up');

                    $title = "Top Up Saldo";
                    $message = "Saldo Anda telah ditambah Rp." . $request->value;
                    $push = new Push($title, $message);

                    $insertHistory = RiwayatHenspay::create([
                        'penerima_id' => $konsumen->id,
                        'penerima_phone' => $konsumen->konsumen_phone,
                        'nominal' => $request->value,
                        'jenis_transaksi' => 'topup',
                        'penerima_tipe' => 'konsumen',
                        'pengirim_id' => $request->id,
                        'pengirim_tipe' => 'admin',
                    ]);

                    //get push
                    $pushNotification = $push->getPush();

                    $deviceToken =   Konsumen::where('konsumen_phone', $request->phone_number)->pluck('token')->toArray();

                    $firebase = new Firebase();
                    $msg = $firebase->send($deviceToken, $pushNotification);




                    return redirect('admin/topup');
                }
            } else {
                Session::flash('flash_error', 'Konsumen Tidak Ditemukan');
                Session::flash('penting', true);
                return redirect('admin/topup')->withInput();
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
}
