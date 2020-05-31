<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccesoriesFavResource extends JsonResource
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
            'id_restoran' => $this->id_restoran,
            'id_kategori' => $this->id_kategori,
            'accesories_kategori' => $this->kategori->kategori_nama,
            'accesories_satuan' => $this->satuan->satuan_nama,
            'accesories_nama' => $this->accesories_nama,
            'accesories_foto' => $this->accesories_foto,
            'accesories_harga' => $this->accesories_harga,
            'accesories_deskripsi' => $this->accesories_deskripsi,
            'accesories_ketersediaan' => $this->accesories_ketersediaan,
            'accesories_discount' => $this->accesories_discount,
            'accesories_jumlah_favorit' => $this->favorit->count(),
            'accesories_favorit' => $this->kons,

        ];
    }
}
