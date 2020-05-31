<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hubungan extends Model
{
    //
    //
    protected $table = 'hubungan';

    protected   $fillable = [
        'nama',
        'email',
        'subjek',
        'phone',
        'kota',
        'pesan'
    ];
}
