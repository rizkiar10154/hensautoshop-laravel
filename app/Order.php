<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'order';

    protected $fillable = [
        'id_konsumen',
        'id_brand',
        'order_lat',
        'order_long',
        'order_alamat',
        'order_catatan',
        'order_metode_bayar',
        'order_jarak_antar',
        'order_biaya_anatar',
        'order_pajak_pb_satu',
        'order_status',
        'order_delivery_id',
        'order_delivery_type',

    ];

    public function  konsumen()
    {
        return $this->belongsTo('App\Konsumen', 'id_konsumen');
    }

    public function  brand()
    {
        return $this->belongsTo('App\Brand', 'id_brand');
    }


    public function order_detail()
    {
        return $this->belongsToMany('App\Accesories', 'detail_order', 'id_order', 'id_accesories')
            ->withPivot('qty', 'harga', 'discount', 'catatan')
            ->withTimestamps();
    }


    public function getOrderStatusAttribute($order_status)
    {
        return ucwords($order_status);
    }
}
