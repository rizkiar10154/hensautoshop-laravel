<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id_konsumen' => $this->id_konsumen,
            'id_brand' => $this->id_brand,
            'order_lat' => $this->order_lat,
            'order_long' => $this->order_long,
            'order_alamat'  => $this->order_alamat,
            'order_catatan'  => $this->order_catatan,
            'order_metode_bayar'  => $this->order_metode_bayar,
            'order_jarak_antar'  => (number_format($this->order_jarak_antar, 2)),
            'order_biaya_anatar' => $this->order_biaya_anatar,
            'order_pajak_pb_satu' => $this->order_pajak_pb_satu,
            'order_status'  => $this->order_status,
            'order_delivery_id' => $this->order_delivery_id,
            'order_delivery_type'  => $this->order_delivery_type,
            'created_at' => $this->created_at->format('d-m-Y H:i:s'),
            'order_brand' => $this->brand->brand_nama,
            'order_konsumen' => $this->konsumen->konsumen_nama,
            'order_konsumen_phone' => $this->konsumen->konsumen_phone,
            'detail_order' => $this->order_detail,


        ];
    }
}
