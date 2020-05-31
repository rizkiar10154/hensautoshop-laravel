<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    //
    protected $table = 'favorit';

    protected $fillable = [
        'id_accesories',
        'id_konsumen',
    ];

    public function  konsumen()
    {
        return $this->belongsTo('App\Konsumen', 'id_konsumen');
    }

    public function  accesories()
    {
        return $this->belongsTo('App\Menu', 'id_accesories');
    }
}
