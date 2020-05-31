<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KurirResource extends JsonResource
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
            'id_brand' => $this->id_brand,
            'kurir_nama' => $this->kurir_nama,
            'kurir_email' => $this->kurir_email,
            'kurir_phone' => $this->kurir_phone,
            'token' => $this->token,
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
