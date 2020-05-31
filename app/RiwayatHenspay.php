<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatHenspay extends Model
{
    //
    //
    protected $table = 'riwayat_henspay';

    protected $fillable = [
        'penerima_id',
        'penerima_phone',
        'nominal',
        'jenis_transaksi',
        'penerima_tipe',
        'pengirim_id',
        'pengirim_tipe',
    ];

    //Asessor
    public function getPenerimaTipeAttribute($penerima_tipe)
    {
        return ucwords($penerima_tipe);
    }

    public function getPengirimTipeAttribute($pengirim_tipe)
    {
        return ucwords($pengirim_tipe);
    }
}
