<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table = 'brand';

    protected $fillable = [
        'brand_nama',
        'brand_phone',
        'brand_email',
        'brand_deskripsi',
        'brand_alamat',
        'brand_oprasional',
        'brand_latitude',
        'brand_longitude',
        'brand_foto',
        'brand_pemilik_nama',
        'brand_pemilik_email',
        'brand_pemilik_phone',
        'brand_balance',
        'brand_delivery',
        'brand_delivery_tarif',
        'brand_delivery_jarak',
        'brand_delivery_minimum',
        'brand_pajak_pb_satu',
        'brand_status',
        'token'

    ];

    public function kategori()
    {
        return $this->belongsToMany('App\Kategori', 'brand_kategori', 'id_brand', 'id_kategori')->withTimestamps();
    }

    public function  accesories()
    {
        return $this->hasMany('App\Accesories', 'id_brand');
    }

    public function  kurir()
    {
        return $this->hasMany('App\Kurir', 'id_brand');
    }

    public function  order()
    {
        return $this->hasMany('App\Order', 'id_brand');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at'
    ];
}
