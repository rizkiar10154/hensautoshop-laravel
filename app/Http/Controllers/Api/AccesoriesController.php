<?php

namespace App\Http\Controllers\Api;

use App\Favorit;
use App\Http\Resources\AccesoriesFavResource;
use App\Http\Resources\AccesoriesResource;
use App\Http\Resources\SatuanResource;
use App\Kategori;
use App\Accesories;
use App\Brand;
use App\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AccesoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $id = $request->input('id');


        if ($request->has('id_konsumen')) {

            $id_konsumen = $request->input('id_konsumen');

            $brand = Brand::where('id', $id)->first();
            if ($brand) {


                $accs = DB::select(DB::raw(' SELECT a.id,a.id_brand,a.id_kategori,a.accesories_nama,a.accesories_foto,a.accesories_harga,a.accesories_deskripsi,a.accesories_ketersediaan,a.accesories_discount,(SELECT  count(*) FROM favorit where id_accesories = a.id) AS accesories_jumlah_favorit,(SELECT  count(*) FROM favorit where id_accesories = a.id AND id_konsumen = ' . $id_konsumen . ') AS accesories_favorit  FROM `accesories` a WHERE a.id_brand =' . $id . ' AND accesories_delete=0 ;'));

                //$kategori = DB::select(DB::raw('SELECT a.id_kategori,b.kategori_nama,b.kategori_deskripsi,count(*) AS jumlah_accesories FROM `accesories` a,`kategori` b  WHERE a.id_brand ='.$id.' AND a.id_kategori = b.id GROUP BY a.id_kategori;' ));

                $m = Accesories::where('id_brand', $id)
                    ->where('accesories_delete', 0)
                    ->get();

                $m->map(function ($item) use ($id_konsumen) {
                    $item['kons'] = $id_konsumen;
                    return $item;
                });


                $kategori = DB::table('accesories')
                    ->select('accesories.id_kategori as id', 'kategori.kategori_nama', 'kategori.kategori_deskripsi', DB::raw('count(*) as total_accesories'))
                    ->join('kategori', 'accesories.id_kategori', '=', 'kategori.id')
                    ->where('accesories.id_brand', $id)
                    ->groupBy('id')
                    ->get();

                $accColl = AccesoriesResource::collection($m);

                return [
                    'value' => '1',
                    'message' => 'success',
                    "brand_accesories" => $accColl,
                    "brand_kategori" => $kategori
                ];
            } else {
                return [
                    'value' => '0',
                    'message' => 'Brand Tidak Ditemukan',
                ];
            }
        } else {

            $brand = Brand::where('id', $id)->first();
            if ($brand) {
                $accesories = AccesoriesResource::collection($brand->accesories->where('accesories_delete', '0'));
                return [
                    'value' => '1',
                    'message' => 'success',
                    "brand_accesories" => $accesories,
                    "brand_kategori" => $brand->kategori
                ];
            } else {
                return [
                    'value' => '0',
                    'message' => 'Brand Tidak Ditemukan',
                ];
            }
        }
    }

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

        if ($request->hasFile("accesories_foto")) {
            $foto = $request->file('accesories_foto');
            $ext = $foto->getClientOriginalExtension();

            if ($request->file('accesories_foto')->isValid()) {
                $foto_name = date('YmdHis') . ".$ext";
                $upload_patch = 'public/fotoaccesories';
                $request->file('accesories_foto')->move($upload_patch, $foto_name);
                $input['accesories_foto'] = $foto_name;
            }

            $accesories = Accesories::create($input);

            if ($accesories) {
                return [
                    'value' => '1',
                    'message' => 'Tambah Accesories Berhasil',
                ];
            } else {
                return [
                    'value' => '0',
                    'message' => 'Tambah Accesories Gagal',
                ];
            }
        } else {
            return [
                'value' => '0',
                'message' => 'Tambah Accesories Gagal',
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSatuan()
    {
        //
        $satuan = Satuan::all();
        $satuanColl = SatuanResource::collection($satuan);
        return [
            'value' => '1',
            'message' => 'Succes',
            'satuan' => $satuanColl
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $accesoriesReq = $request->all();

        $Accesories = Accesories::findOrFail($id);

        if ($Accesories->update($accesoriesReq)) {

            return [
                'value' => '1',
                'message' => 'Update Accesories Berhasil',
            ];
        } else {
            return [
                'value' => '0',
                'message' => 'Update Accesories Gagal',
            ];
        }
    }


    public function updateWithPhoto(Request $request, $id)
    {
        //
        $input = $request->all();

        $Accesories = Accesories::findOrFail($id);

        if ($request->hasFile("accesories_foto")) {
            $foto = $request->file('accesories_foto');
            $ext = $foto->getClientOriginalExtension();

            if ($request->file('accesories_foto')->isValid()) {
                $foto_name = date('YmdHis') . ".$ext";
                $upload_patch = 'public/fotoaccesories';
                $request->file('accesories_foto')->move($upload_patch, $foto_name);
                $input['accesories_foto'] = $foto_name;
            }

            $accesories = $Accesories->update($input);

            if ($accesories) {
                return [
                    'value' => '1',
                    'message' => 'Tambah Accesories Berhasil',
                ];
            } else {
                return [
                    'value' => '0',
                    'message' => 'Tambah Accesories Gagal',
                ];
            }
        } else {
            return [
                'value' => '0',
                'message' => 'Tambah Accesories Gagal',
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
        $accesories = Accesories::findOrFail($id);

        $update = $accesories->update(array('accesories_delete' => (1)));

        if ($update) {
            return [
                'value' => '1',
                'message' => 'Hapus Accesories Berhasil',
            ];
        } else {
            return [
                'value' => '0',
                'message' => 'Hapus Accesories Gagal',
            ];
        }
    }
}
