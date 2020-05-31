<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class KonsumenResource extends JsonResource
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
            'konsumen_nama'=> $this->konsumen_nama,
            'konsumen_email' => $this->konsumen_email,
            'konsumen_phone' => $this->konsumen_phone,
            'konsumen_balance'=> $this->konsumen_balance,
            'konsumen_blacklist' =>$this->konsumen_blacklist,
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
