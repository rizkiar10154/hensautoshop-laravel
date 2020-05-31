<?php

namespace App\Http\Controllers\Api;

use App\DetailOrder;
use App\Favorit;
use App\Firebase;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Konsumen;
use App\Kurir;
use App\Mail\SendMailable;
use App\Order;
use App\Profit;
use App\Push;
use App\Brand;
use App\Saldo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $status = $request->input('status');
        $id = null;
        $param = null;
        if ($request->has('id_brand')) {
            $id = $request->input('id_brand');
            $param = 'id_brand';
        }
        if ($request->has('id_konsumen')) {
            $id = $request->input('id_konsumen');
            $param = 'id_konsumen';
        }

        $orders =  Order::where($param, $id)->whereIn('order_status', $status)->orderBy('created_at', 'ASC')->get();
        $orderResource = OrderResource::collection($orders)->sortByDesc('created_at');


        if ($orders->count() > 0) {
            return new OrderCollection($orderResource);
        } else {
            return [
                "value" => "0",
                "message" => "Anda Tidak Memiliki Pesan",

            ];
        }
    }

    public function pengantaran(Request $request)
    {
        //
        $order_delivery_id = $request->input('order_delivery_id');
        $order_delivery_type = $request->input('order_delivery_type');
        $status = 'pengantaran';



        $orders =  Order::where('order_delivery_id', $order_delivery_id)->where('order_delivery_type', $order_delivery_type)->where('order_status', $status)->orderBy('created_at', 'ASC')->get();
        $orderResource = OrderResource::collection($orders)->sortByDesc('created_at');


        if ($orders->count() > 0) {
            return new OrderCollection($orderResource);
        } else {
            return [
                "value" => "0",
                "message" => "Anda Tidak Memiliki Pesan",

            ];
        }
    }

    public function historipengantaran(Request $request)
    {
        //

        $order_delivery_id = $request->input('order_delivery_id');
        $order_delivery_type = $request->input('order_delivery_type');
        $status = ['selesai', 'batal'];



        $orders =  Order::where('order_delivery_id', $order_delivery_id)->where('order_delivery_type', $order_delivery_type)->whereIn('order_status', $status)->orderBy('created_at', 'ASC')->get();
        $orderResource = OrderResource::collection($orders)->sortByDesc('created_at');


        if ($orders->count() > 0) {


            return new OrderCollection($orderResource);
        } else {
            return [
                "value" => "0",
                "message" => "Anda Tidak Memiliki Pesan",

            ];
        }
    }

    public function laporanpengantaran(Request $request)
    {
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;
        $order_delivery_id = $request->input('order_delivery_id');
        $order_delivery_type = $request->input('order_delivery_type');
        $status = ['selesai', 'batal'];

        $selesaiHariIni = Order::where('order_delivery_id', $order_delivery_id)
            ->where('order_delivery_type', $order_delivery_type)
            ->where('order_status', 'selesai')
            ->whereDate('updated_at', '=', $now)
            ->get();

        $batalHariIni = Order::where('order_delivery_id', $order_delivery_id)
            ->where('order_delivery_type', $order_delivery_type)
            ->where('order_status', 'batal')
            ->whereDate('updated_at', '=', $now)
            ->get();

        $selesaiBulanIni = Order::where('order_delivery_id', $order_delivery_id)
            ->where('order_delivery_type', $order_delivery_type)
            ->where('order_status', 'selesai')
            ->whereYear('updated_at', '=', $year)
            ->whereMonth('updated_at', '=', $month)
            ->get();

        $batalBulanIni = Order::where('order_delivery_id', $order_delivery_id)
            ->where('order_delivery_type', $order_delivery_type)
            ->where('order_status', 'batal')
            ->whereYear('updated_at', '=', $year)
            ->whereMonth('updated_at', '=', $month)
            ->get();

        $orders =  Order::where('order_delivery_id', $order_delivery_id)->where('order_delivery_type', $order_delivery_type)->orderBy('created_at', 'ASC')->get();
        $orderResource = OrderResource::collection($orders)->sortByDesc('created_at');

        //        $odr = Order::where('order_delivery_id',$order_delivery_id)->where('order_delivery_type',$order_delivery_type)->whereIn('order_status',$status)->orderBy('created_at', 'ASC')
        //            ->get()
        //            ->groupBy(function($date) {
        //                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
        //                return Carbon::parse($date->created_at)->format('m'); // grouping by months
        //            });
        //
        //        $usermcount = [];
        //        $odrArr = [];
        //
        //        foreach ($odr as $key => $value) {
        //            $usermcount[(int)$key] = count($value);
        //        }
        //
        //        for($i = 1; $i <= 12; $i++){
        //            if(!empty($usermcount[$i])){
        //                $odrArr[$i] = $usermcount[$i];
        //            }else{
        //                $odrArr[$i] = 0;
        //            }
        //        }

        return [
            "value" => "1",
            "message" => "succes",
            "selesaiHariIni" => $selesaiHariIni->count(),
            "batalHariIni" => $batalHariIni->count(),
            "selesaiBulanIni" => $selesaiBulanIni->count(),
            "batalBulanIni" => $batalBulanIni->count(),
            "totalBerhasil" => $orderResource->where('order_status', 'Selesai')->count(),
            "totalBatal" => $orderResource->where('order_status', 'Batal')->count()



        ];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get title
        $title = $request->input('title');
        //get message
        $message = $request->input('message');
        //get id brand
        $id_brand = $request->input('id_brand');
        //create push
        $push = new Push($title, $message);
        //get push
        $pushNotification = $push->getPush();

        //get token brand
        $deviceToken = Brand::where('id', $id_brand)->pluck('token')->toArray();
        //ambil kurir
        $kurirs = Kurir::where('id_brand', $id_brand)->where('kurir_delete', '0')->where('token', '!=', null)->get();

        //get token kurir jika ada
        if ($kurirs->count() > 0) {
            foreach ($kurirs as $kurir) {
                array_push($deviceToken, $kurir->token);
            }
        }


        //get request all
        $data = $request->all();

        //inseet to db
        $order = Order::create($data);

        //get detail_order konponeen
        $accesories = $request->input('accesories');
        $qty =  $request->input('qty');
        $harga = $request->input('harga');
        $discount = $request->input('discount');
        $catatan = $request->input('catatan');

        //insert all komponnene
        for ($i = 0; $i < count($accesories); $i++) {
            $order->order_detail()->attach($accesories[$i], ['qty' => $qty[$i], 'harga' => $harga[$i], 'discount' => $discount[$i], 'catatan' => $catatan[$i]]);
        }

        //cek konsisi inseert
        if ($order) {


            //notification ke konsumen
            $firebase = new Firebase();
            $msg = $firebase->send($deviceToken, $pushNotification);


            //Biaya order
            $brand = Brand::findOrFail($id_brand);
            $saldo = Saldo::all()->first();

            $brand->update(array('brand_balance' => ($brand->brand_balance - 50)));
            $saldo->update(array('balance' => ($saldo->balance + 50)));

            $insertHistory = Profit::create([
                'id_order' => $order->id,
                'biaya' => '50',
                'status' => 'sukses',
            ]);

            return [
                'value' => '1',
                'message' => "success",
                'id' => $order->id,
                //              'devicetoken' => $deviceToken,
                //                'msg' => $msg,
            ];
        } else {
            return [
                'value' => '0',
                'message' => "gagal",

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
        $orders =  Order::findOrFail($id);

        $order = new OrderResource($orders);
        return [
            'value' => '1',
            'message' => "success",
            'order' => $order,


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
        $order = Order::findOrFail($id);
        if ($order->update($request->all())) {
            $msg = null;
            $title = $order->brand->brand_nama;
            if ($request->order_status == "pengantaran") {
                $message = "Pesaan anda dalam Pengantaran";
                //create push
                $push = new Push($title, $message);

                //get push
                $pushNotification = $push->getPush();

                $deviceToken =   Konsumen::where('id', $order->id_konsumen)->pluck('token')->toArray();

                //notif ke konsumen
                $firebase = new Firebase();
                $msg = $firebase->send($deviceToken, $pushNotification);
            } else if ($request->order_status == "batal") {
                $message = "Pesan anda telah dibatalkan";
                //create push
                $push = new Push($title, $message);

                //get push
                $pushNotification = $push->getPush();

                $deviceToken =   Konsumen::where('id', $order->id_konsumen)->pluck('token')->toArray();

                //notif ke konsumen
                $firebase = new Firebase();
                $msg = $firebase->send($deviceToken, $pushNotification);


                //Kembali Biaya order
                $brand = Brand::findOrFail($order->id_brand);
                $saldo = Saldo::all()->first();

                $brand->update(array('brand_balance' => ($brand->brand_balance + 50)));
                $saldo->update(array('balance' => ($saldo->balance - 50)));

                //cancel Profit
                $profit =  Profit::where('id_order', $id)->first();
                $profit->update(array('status' => 'batal'));
            }


            return [
                'value' => '1',
                'message' => 'Succes',
                //                'msg' => $msg
            ];
        } else {
            return [
                'value' => '0',
                'message' => 'Gagal',
            ];
        }
    }

    public function pembayaran(Request $request, $id)
    {
        //
        $order = Order::findOrFail($id);
        if ($order->order_metode_bayar == "epay") {
            $konsumen =  $order->konsumen;
            $brand = $order->brand;
            $total = $order->order_biaya_anatar;

            foreach ($order->order_detail as $item) {
                if ($item->pivot->discount == null || $item->pivot->harga == 0) {
                    $total = $total + ($item->pivot->harga * $item->pivot->qty);
                } else {
                    $total = $total + (($item->pivot->harga - ($item->pivot->harga * ($item->pivot->discount / 100.00))) * $item->pivot->qty);
                }
            }

            //cek kondisi saldo cukup atau tidak
            if ($total <=  $konsumen->konsumen_balance) {

                //Sisa uang konsumen
                $a = $konsumen->konsumen_balance - $total;
                //tambah balance brand
                $untung = $brand->brand_balance + $total;

                //update uang konsumen
                $cons = Konsumen::where('id', $konsumen->id)->update(array('konsumen_balance' => $a));
                $cons2 = Brand::where('id', $brand->id)->update(array('brand_balance' => $untung));

                //jika berhasil
                if ($cons && $cons2) {
                    $update = $order->update(array('order_status' => 'selesai'));
                    if ($update) {
                        return [
                            'value' => '1',
                            'message' => 'Succes',
                        ];
                    } else {
                        return [
                            'value' => '0',
                            'message' => 'Gagal',
                        ];
                    }
                } else {
                    return [
                        'value' => '0',
                        'message' => 'Gagal',
                    ];
                }

                //saldo tidak cukup
            } else {

                return [
                    'value' => '2',
                    'message' => 'Saldo Tidak Cukup',
                ];
            }
        } else {
            $update = $order->update(array('order_status' => 'selesai'));
            if ($update) {
                return [
                    'value' => '1',
                    'message' => 'Succes',
                ];
            } else {
                return [
                    'value' => '0',
                    'message' => 'Gagal',
                ];
            }
        }
    }



    public function changeMetodeBayar(Request $request, $id)
    {
        //
        $order = Order::findOrFail($id);
        $update = $order->update(array('order_status' => 'selesai'));
        if ($update) {
            $order->update(array('order_metode_bayar' => 'cash'));
            return [
                'value' => '1',
                'message' => 'Succes',
            ];
        } else {
            return [
                'value' => '0',
                'message' => 'Gagal',
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

    public function struk(Request $request)
    {

        $id_order = $request->id_order;


        $order = Order::findOrFail($id_order);
        $email = $order->konsumen->konsumen_email;
        Mail::to($email)->send(new SendMailable($order));
        // return view ('emails.struk',compact('order'));


        return [
            'value' => '1',
            'message' => 'Succes',
        ];
    }
}
