<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BrandResource;
use App\Http\Resources\KurirResource;
use App\Kurir;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Konsumen;
use App\Http\Resources\KonsumenResource;

class AuthController extends Controller
{



    public function hensautoshop($phone)
    {
        $konsumen = Konsumen::where('konsumen_phone', $phone)->first();
        if ($konsumen) {
            return new KonsumenResource($konsumen);
        } else {
            return [
                'value' => '0',
                'message' => 'Nomor Ponsel Tidak Terdaftar',
            ];
        }
    }


    public function brandpartner($phone)
    {
        $brand = Brand::where('brand_phone', $phone)->first();
        if ($brand) {
            $data = new BrandResource($brand);
            if ($brand->brand_status == "aktif") {
                return [
                    "value" => "1",
                    "message" => "succes",
                    "tipe" => "brand",
                    "brand" => $brand,
                ];
            } else {
                return [
                    'value' => '0',
                    'message' => 'Brand dalam tahap review',
                ];
            }
        } else {
            $kurir = Kurir::where('kurir_phone', $phone)->first();
            if ($kurir) {

                $data =  new KurirResource($kurir);
                if ($kurir->brand->brand_status == "aktif") {
                    return [
                        "value" => "1",
                        "message" => "succes",
                        "tipe" => "kurir",
                        "kurir" => $kurir,
                    ];
                } else {
                    return [
                        'value' => '0',
                        'message' => 'Harap hubungi brand anda',
                    ];
                }
            } else {
                return [
                    'value' => '0',
                    'message' => 'Nomor Ponsel Tidak Terdaftar',
                ];
            }
        }
    }
}
