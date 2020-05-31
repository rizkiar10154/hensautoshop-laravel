<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    //
    protected $table = 'kurir';


    protected $fillable = [
        'kurir_nama',
        'kurir_email',
        'kurir_phone',
        'id_brand',
        'kurir_delete',
        'token'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'id_brand');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at'
    ];

    //Asessor
    public function getKurirNamaAttribute($kurir_nama)
    {
        return ucwords($kurir_nama);
    }
}
