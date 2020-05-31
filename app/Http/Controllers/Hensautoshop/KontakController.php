<?php

namespace App\Http\Controllers\Hensautoshop;

use App\Http\Requests\KontakRequest;
use App\Hubungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class KontakController extends Controller
{
    //

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KontakRequest $request)
    {
        $input = $request->all();

        $pesan = Hubungan::create($input);

        Session::flash('flash_message', 'Pesan Berhasil Dikirim');
        return redirect('contact');
    }
}
