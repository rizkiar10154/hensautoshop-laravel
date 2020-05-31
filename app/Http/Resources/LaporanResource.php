<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LaporanResource extends JsonResource
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

            'accesories_nama' => $this->accesories_nama,
            'accesories_jumlah_favorit' => $this->favorit->count(),
            'accesories_jumlah_dipesan' => $this->order->count(),

        ];
    }
}
