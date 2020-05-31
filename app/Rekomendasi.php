<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    //
    protected $table = 'rekomendasi';


    protected $fillable = [
        'nama_brand',
        'number_phone',
        'alamat',
    ];
}
