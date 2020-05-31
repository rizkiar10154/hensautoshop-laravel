<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\KonsumenResource;
use App\Konsumen;
use App\Brand;
use App\Push;
use App\Firebase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\RiwayatHenspay;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $status = $request->input('status');

        $konsumen = Konsumen::whereIn('konsumen_blacklist', $status)->get();

        if ($konsumen->count() > 0) {
            return [
                'value' => '1',
                'message' => 'Succes',
                'data' => $konsumen
            ];
        } else {
            return [
                'value' => '0',
                'message' => 'Tidak Ada Daftar Konsumen',
            ];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Mendaftar Konsumen baru
        $phone = $request->konsumen_phone;
        $konsumen = Konsumen::where('konsumen_phone', $phone)->first();
        if ($konsumen) {
            return [
                'value' => '0',
                'message' => 'Opps! Nomor Handphone Telah Terdaftar',
            ];
        } else {
            $data = $request->all();
            Konsumen::create($data);
            return [
                'value' => '1',
                'message' => 'Berhasil Registrasi',
            ];
        }
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
        $konsumen = Konsumen::findOrFail($id);

        return new KonsumenResource($konsumen);
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

        $konsumen = Konsumen::findOrFail($id);
        if ($konsumen->update($request->all())) {
            // return new KonsumenResource($konsumen);
            return [
                'value' => '1',
                'message' => 'Berhasil Update',
            ];
        } else {
            return [
                'value' => '0',
                'message' => 'Gagal Update',
            ];
        }
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


    public function TopUp(Request $request)
    {
        //
        $input = $request->all();
        $id_konsumen = $input['id_konsumen'];
        $id_brand = $input['id_brand'];
        $value = $input['value'];

        $brand = Brand::findOrFail($id_brand);
        $konsumen = Konsumen::findOrFail($id_konsumen);


        if ($brand->brand_balance > $value) {


            $updateResto = $brand->update(array('brand_balance' => ($brand->brand_balance - $value)));
            $updateKonsumen = $konsumen->update(array('konsumen_balance' => $konsumen->konsumen_balance + $value));

            if ($updateResto && $updateKonsumen) {
                //create push
                $title = "Top Up Saldo";
                $message = "Saldo Anda telah ditambah Rp." . $value;
                $push = new Push($title, $message);

                //get push
                $pushNotification = $push->getPush();

                $deviceToken =   Konsumen::where('id', $id_konsumen)->pluck('token')->toArray();

                $firebase = new Firebase();
                $msg = $firebase->send($deviceToken, $pushNotification);

                if ($request->has('id_kurir')) {
                    $id_kurir = $input['id_kurir'];
                    $insertHistory = RiwayatHenspay::create([
                        'penerima_id' => $konsumen->id,
                        'penerima_phone' => $konsumen->konsumen_phone,
                        'nominal' => $value,
                        'jenis_transaksi' => 'topup',
                        'penerima_tipe' => 'konsumen',
                        'pengirim_id' => $id_kurir,
                        'pengirim_tipe' => 'kurir',
                    ]);
                } else {
                    $insertHistory = RiwayatHenspay::create([
                        'penerima_id' => $konsumen->id,
                        'penerima_phone' => $konsumen->konsumen_phone,
                        'nominal' => $value,
                        'jenis_transaksi' => 'topup',
                        'penerima_tipe' => 'konsumen',
                        'pengirim_id' => $id_konsumen,
                        'pengirim_tipe' => 'brand',
                    ]);
                }

                return [
                    'value' => '1',
                    'message' => 'Berhasil Transfer',

                ];
            } elseif ($updateResto || $updateKonsumen) {
                if ($updateResto) {
                    $updateBack = $brand->update(array('brand_balance' => ($brand->brand_balance + $value)));
                    return [
                        'value' => '0',
                        'message' => 'Gagal transfer',
                    ];
                }
                if ($updateKonsumen) {
                    $updateBack = $konsumen->update(array('konsumen_balance' => $konsumen->konsumen_balance - $value));
                    return [
                        'value' => '0',
                        'message' => 'Gagal transfer',
                    ];
                }
            }
        } else {
            return [
                'value' => '0',
                'message' => 'Saldo Tidak Mencukupi',

            ];
        }

        // barang () => ({
        //)



    }
}
