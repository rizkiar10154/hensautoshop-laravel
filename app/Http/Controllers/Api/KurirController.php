<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\KurirResource;
use App\Kurir;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->has('id_brand')) {
            $id_brand = $request->input('id_brand');
            $brand = Brand::findOrFail($id_brand);
            $kurir = $brand->kurir->where('kurir_delete', '=', '0');
            $kurirCollec = KurirResource::collection($kurir);
            if ($brand->kurir->where('kurir_delete', 0)->count() > 0) {
                return [
                    'value' => '1',
                    'message' => 'success',
                    'kurir' => $kurirCollec
                ];
            } else {
                return [
                    'value' => '0',
                    'message' => 'gagal',

                ];
            }
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
        //
        //Mendaftar Kurir baru
        $phone = $request->kurir_phone;
        $kurir = Kurir::where('kurir_phone', $phone)->first();
        $brand  = Brand::where('brand_phone', $phone)->first();
        if ($kurir) {
            return [
                'value' => '0',
                'message' => 'Opps! Nomor Handphone Telah Terdaftar',
            ];
        } else if ($brand) {
            return [
                'value' => '0',
                'message' => 'Opps! Nomor Handphone Telah Terdaftar',
            ];
        } else {
            $data = $request->all();
            Kurir::create($data);
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
        $kurir = Kurir::findOrFail($id);
        if ($kurir->update($request->all())) {

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
        $kurir = Kurir::findOrFail($id);
        $update = $kurir->update(array('kurir_delete' => 1));
        if ($update) {

            return [
                'value' => '1',
                'message' => 'Kurir Berhasil Dihapus',
            ];
        } else {
            return [
                'value' => '0',
                'message' => 'Gagal Menghapus Kurir',
            ];
        }
    }
}
