<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\LaporanResource;
use App\Http\Resources\AccesoriesResource;
use App\Http\Resources\BrandCollection;
use App\Http\Resources\BrandResource;
use App\Konsumen;
use App\Accesories;
use App\Order;
use App\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //ambil parameter lokasi user
        $lat = $request->input('lat');
        $long = $request->input('long');
        $id_konsumen = $request->input('id_konsumen');


        //ambil satu brand untuk cart
        if ($request->has('id_brand')) {
            $id_brand =  $request->input('id_brand');

            $brnd = $this->get_brandt($lat, $long, $id_brand);
            $konsumen =  Konsumen::findOrFail($id_konsumen);
            $saldo =  $konsumen->konsumen_balance;

            if ($brnd->count() > 0) {
                $brand = new BrandResource($brnd);
                $accesories = $brand->accesories->where('accesories_delete', 0);
                $accesories_item = AccesoriesResource::collection($accesories);
                return [
                    'value' => '1',
                    'message' => 'Brand Ditemukan',
                    'konsumen_balance' => $saldo,
                    'data' => $brand,
                    'accesories' => $accesories_item,


                ];
            } else {
                return [
                    'value' => '0',
                    'message' => 'Brand Tidak Ditemukan',
                ];
            }
        } else if ($request->has('cari')) {
            $key = $request->input('cari');

            //cari brand terdekat
            $re = $this->get_brandt_near($lat, $long, 300);


            //ubah kearray
            $koleksi = $re->toArray();
            $items = array();

            $accesories = array();
            foreach ($koleksi as $brnd) {
                //ambil brand yang memungkinkan untuk mengantarkan
                if ($brnd['distance'] < $brnd['brand_delivery_jarak']) {
                    $Brand = Brand::findOrFail($brnd['id']);

                    //ambil brand yang memiliki accesories saja
                    if ($Brand->accesories->where('accesories_delete', 0)->count() > 0) {
                        //set id brand yang sudah di seleksi
                        $items[] = $brnd['id'];
                        //get accesories
                        $tem = $Brand->accesories;
                        for ($x = 0; $x < $Brand->accesories->count(); $x++) {
                            $accesories[] = $tem[$x];
                        }
                    }
                }
            }

            //ambil data brand berdasarkan brand yang memungkinkan
            $brand_coll = $re->whereIn('id', $items);


            //            $x =collect($brand_coll)->filter(function ($item) use ($key) {
            //                // replace stristr with your choice of matching function
            //                return false !== strisr($item->brand_nama, $key);
            //            });

            //mb_strpos

            $brandCollection = $brand_coll->reject(function ($element) use ($key) {
                return stripos($element->brand_nama, $key) === false;
            });
            $x = collect($accesories);
            $accesoriesCollection = $x->reject(function ($element) use ($key) {
                return stripos(strtolower($element->accesories_nama), $key) === false;
            });

            //jika brand memungkinkan besar dari 0 , tampilkan seluruh brand
            if ($brandCollection->count() > 0 || $accesoriesCollection->count() > 0) {
                $b = BrandResource::collection($brandCollection);
                $c =  $b->sortByDesc('brand_order');
                $hasilAccesories = AccesoriesResource::collection($accesoriesCollection);
                $hasilBrand = new BrandCollection($c);

                return [
                    'value' => '1',
                    'message' => 'succes',
                    'brand' => $hasilBrand,
                    'accesories' => $hasilAccesories,
                ];


                //jika tidak ada brand memungkinkan
            } else {
                return [
                    'value' => '0',
                    'message' => 'Brand Tidak Ditemukan',
                ];
            }
        } else {
            //cari brand terdekat
            $re = $this->get_brandt_near($lat, $long, 300);


            //ubah kearray
            $koleksi = $re->toArray();
            $items = array();
            foreach ($koleksi as $brnd) {
                //ambil brand yang memungkinkan untuk mengantarkan
                if ($brnd['distance'] < $brnd['brand_delivery_jarak']) {
                    $Brand = Brand::findOrFail($brnd['id']);
                    //ambil brand yang memiliki accesories saja
                    if ($Brand->accesories->where('accesories_delete', 0)->count() > 0) {
                        //set id brand yang sudah di seleksi
                        $items[] = $brnd['id'];
                    }
                }
            }

            //ambil data brand berdasarkan brand yang memungkinkan
            $brand_coll = $re->whereIn('id', $items);

            //jika brand memungkinkan besar dari 0 , tampilkan seluruh brand
            if ($brand_coll->count() > 0) {
                $b = BrandResource::collection($brand_coll);
                //    $c =  $b->sortByDesc('brand_distace2');
                return new BrandCollection($b);

                //jika tidak ada brand memungkinkan
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
        $brand = Brand::findOrFail($id);


        if ($brand != null) {
            return new BrandResource($brand);
        } else {
            return array('not found');
        }
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

        $brand = Brand::findOrFail($id);
        if ($brand->update($request->all())) {
            // return new KonsumenResource($konsumen);
            return [
                'value' => '1',
                'message' => 'Berhasil Update',
                'brnd' => $brand,
            ];
        } else {
            return [
                'value' => '0',
                'message' => 'Gagal Update',
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
    }


    public function laporan($id)
    {
        //
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;
        $order = Order::where('id_brand', $id)
            ->whereDate('created_at', '=', $now)
            ->get();
        $orderMonth = Order::where('id_brand', $id)
            ->whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->get();

        $accesories = Accesories::where('id_brand', $id)
            ->where('accesories_delete', '0')
            ->get();

        $a = LaporanResource::collection($accesories);


        return [
            'jumlah_order' => $order->where('order_status', 'Proses')->count(),
            'jumlah_pengantaran' => $order->where('order_status', 'Pengantaran')->count(),
            'jumlah_selesai' => $order->where('order_status', 'Selesai')->count(),
            'jumlah_batal' => $order->where('order_status', 'Batal')->count(),
            'order_month_selesai' => $orderMonth->where('order_status', 'Selesai')->count(),
            'order_month_batal' => $orderMonth->where('order_status', 'Batal')->count(),
            'accesories' => $a,
        ];
    }






    public function get_brandt_near($latitude, $longitude, $radius)
    {

        $offers = Brand::select('brand.*')
            ->selectRaw('( 6371* acos( cos( radians(?) ) *
                           cos( radians( brand_latitude ) )
                           * cos( radians( brand_longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( brand_latitude ) ) )
                         ) AS distance', [$latitude, $longitude, $latitude])
            ->havingRaw("distance <?", [$radius])
            ->where("brand_status", "=", "aktif")
            ->where("brand_balance", ">", 50)
            ->orderBy('distance')
            ->get();

        return $offers;
    }


    public function get_brandt($latitude, $longitude, $id)
    {

        $offers = Brand::select('brand.*')
            ->selectRaw('( 6371* acos( cos( radians(?) ) *
                           cos( radians( brand_latitude ) )
                           * cos( radians( brand_longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( brand_latitude ) ) )
                         ) AS distance', [$latitude, $longitude, $latitude])
            ->where("brand_status", "=", "aktif")
            ->where("id", "=", $id)
            ->where("brand_balance", ">", 50)
            ->first();

        return $offers;
    }
}
