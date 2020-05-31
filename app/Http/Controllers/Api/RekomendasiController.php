<?php

namespace App\Http\Controllers\Api;

use App\Rekomendasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekomendasiController extends Controller
{
    //
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $rekomendasi = Rekomendasi::create($input);

        if($rekomendasi){
            return[
                'value' => '1',
                'message' => "success",
            ];
        }else{
            return[
                'value' => '0',
                'message' => "gagal",
            ];
        }


    }
}
