<?php

namespace App\Http\Controllers\Admin;

use App\Profit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProfitController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function harian()
    {
        //
        $now = Carbon::now();
        $yesterday = Carbon::yesterday();
        $month = $now->month;
        $year = $now->year;

        $dataProfitHarian = Profit::whereDate('created_at', '=', $now)->get();

        $dataProfitHarianKemarin = Profit::whereDate('created_at', '=', $yesterday)->get();


        return view('admin.profit.harian',compact('dataProfitHarian','dataProfitHarianKemarin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulanan()
    {
        //
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;

        $dataProfitHarian = Profit::whereDate('created_at', '=', $now)->get();



//        $odr = Profit::where('status','sukses')
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
//            $usermcount[(int)$key] =$value[]['biaya'];
//        }
//
//        for($i = 1; $i <= 12; $i++){
//            if(!empty($usermcount[$i])){
//                $odrArr[$i] = $usermcount[$i];
//            }else{
//                $odrArr[$i] = 0;
//            }
//        }

        $dataProfitBulanan = Profit::select(
            DB::raw('sum(biaya) as total'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
        )
            ->groupBy('months')
            ->where('status','sukses')
            ->get();
        //return $orders;


        return view('admin.profit.bulanan',compact('dataProfitBulanan'));
    }
}
