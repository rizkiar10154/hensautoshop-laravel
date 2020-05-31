<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uat extends Model
{
    //
    protected $table ='uat';


    protected $fillable = [
        'id_user',
        'soal_1',
        'soal_2',
        'soal_3',
        'soal_4',
        'soal_5',
        'soal_6',
    ];
}
