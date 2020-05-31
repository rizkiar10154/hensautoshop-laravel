<?php

namespace App\Http\Resources;

use App\Brand;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoritResource extends JsonResource
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
            'id_accesories' => $this->id_accesories,
            'favorit_accesories' => $this->accesories,
            'favorit_brand' => Brand::findOrFail($this->accesories->id_brand),
        ];
    }
}
