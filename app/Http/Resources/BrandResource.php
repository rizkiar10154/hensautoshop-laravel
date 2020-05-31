<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'brand_nama' => $this->brand_nama,
            'brand_phone' => $this->brand_phone,
            'brand_email' => $this->brand_email,
            'brand_deskripsi' => $this->brand_deskripsi,
            'brand_alamat' => $this->brand_alamat,
            'brand_latitude' => $this->brand_latitude,
            'brand_longitude' => $this->brand_longitude,
            'brand_oprasional' => $this->brand_oprasional,
            'brand_foto' => $this->brand_foto,
            'brand_pemilik_nama' => $this->brand_pemilik_nama,
            'brand_pemilik_email' => $this->brand_pemilik_email,
            'brand_pemilik_phone' => $this->brand_pemilik_phone,
            'brand_delivery' => $this->brand_delivery,
            'brand_delivery_tarif' => $this->brand_delivery_tarif,
            'brand_delivery_jarak' => $this->brand_delivery_jarak,
            'brand_delivery_minimum' => $this->brand_delivery_minimum,
            'brand_pajak_pb_satu' => $this->brand_pajak_pb_satu,
            'brand_balance' => $this->brand_balance,
            'brand_distace' => (number_format($this->distance, 2)),
            //   'brand_distace2'=>($this->distance),
            'brand_order' => $this->order->where("order_status", "Selesai")->count(),
            'jumlah_kurir' => $this->kurir->where("kurir_delete", "==", 0)->count(),
            'brand_token' => $this->token,
            //            'brand_kategori' => $this->kategori,
            //            'brand_menu' => $this->menu->where("menu_delete",0),

        ];
    }

    public function with($request)
    {
        return [
            'value' => '1',
            'message' => 'Success',
        ];
    }
}
