<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accesories extends Model
{
    //
    protected $table = 'accesories';



    protected $fillable = [
        'id_brand',
        'id_kategori',
        'id_satuan', //tambahan
        'accesories_nama',
        'accesories_foto',
        'accesories_harga',
        'accesories_deskripsi',
        'accesories_ketersediaan',
        'accesories_discount',
        'accesories_delete'


    ];

    protected $hidden = [
        'updated_at', 'accesories_delete', 'created_at'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'id_brand');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }

    public function satuan()
    {
        return $this->belongsTo('App\Satuan', 'id_satuan');
    }

    public function order()
    {
        return $this->belongsToMany('App\Order', 'detail_order', 'id_accesories', 'id_order');
    }

    public function  favorit()
    {
        return $this->hasMany('App\Favorit', 'id_accesories');
    }



    //Asessor
    public function getAccesoriesNamaAttribute($accesories_nama)
    {
        return ucwords($accesories_nama);
    }


    //Mutator
    //    public function setAccesoriesNamaAttribute($accesories_nama){
    //        return strtolower($accesories_nama);
    //    }

}
