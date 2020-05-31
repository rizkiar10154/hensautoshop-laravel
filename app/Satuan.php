<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    //
    //
    protected $table = 'satuan';

    //protected $hidden = ['pivot','created_at','updated_at']; // doesn't work

    protected $fillable = ['satuan_nama'];



    public function accesories()
    {
        return $this->hasMany('App\Accesories', 'id_satuan');
    }




    public function getKategoriNamaAttribute($satuan_nama)
    {
        return ucwords($satuan_nama);
    }
}
