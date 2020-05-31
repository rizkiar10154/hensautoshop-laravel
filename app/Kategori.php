<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $table = 'kategori';

    protected $hidden = ['pivot', 'created_at', 'updated_at']; // doesn't work

    protected $fillable = ['kategori_nama', 'kategori_deskripsi'];

    public function brand()
    {
        return $this->belongsToMany('App\Brand', 'brand_kategori', 'id_kategori', 'id_brand');
    }

    public function accesories()
    {
        return $this->hasMany('App\Accesories', 'id_kategori');
    }




    public function getKategoriNamaAttribute($kategori_nama)
    {
        return ucwords($kategori_nama);
    }
}
