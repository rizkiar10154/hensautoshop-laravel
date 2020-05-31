<?php

namespace App\Http\Controllers\Api;

use App\Favorit;
use App\Http\Resources\FavoritResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoritController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        Favorit::create($data);

        if($data){
            return [
                'value' => "1",
                'message' => 'Menu Menjadi Favorit',

            ];
        }else{
            return [
                'value' => "0",
                'message' => 'Gagal Menjadi Favorit',

            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $favorit = Favorit::where('id_konsumen',$id)->get();
        $favoritResource = FavoritResource::collection($favorit);

        if ($favorit->count() >0) {
            return [
                'value' => "1",
                'message' => 'success',
                'favorit' => $favoritResource
            ];
        }else{
            return [
                'value' => "0",
                'message' => 'Anda Tidak Memiliki Favorit',

            ];
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $favorit = Favorit::findOrFail($id);
        $favorit->delete();
        if($favorit){
            return [
                'value' => "1",
                'message' => 'Berhasil Dihapus',
            ];
        }else{
            return [
                'value' => "0",
                'message' => 'Gagal Hapus',
            ];
        }
    }
}
