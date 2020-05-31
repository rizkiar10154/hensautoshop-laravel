<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    //
    protected $table = 'konsumen';

    protected   $fillable = [
        'konsumen_nama',
        'konsumen_phone',
        'konsumen_email',
        'konsumen_balance',
        'konsumen_blacklist',
        'token',
    ];


    public function  order(){
        return $this->hasMany('App\Order','id_konsumen');
    }

    public function  favorit(){
        return $this->hasMany('App\Favorit','id_konsumen');
    }


    public function getKonsumenNamaAttribute($konsumen_nama){
        return ucwords($konsumen_nama);
    }
}
