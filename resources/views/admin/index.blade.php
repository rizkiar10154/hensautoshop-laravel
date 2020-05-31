@extends('admin.layout.base_template_admin')

<?php

function convert_to_rupiah($angka)
{
    $agk =   substr($angka, 0, -3);
    return       ' ' . strrev(implode('.', str_split(strrev(strval($agk)), 3)));
}
function to_rupiah($angka)
{

    return      'Rp. ' . strrev(implode('.', str_split(strrev(strval($angka)), 3)));
}

?>

@section('main')


<!-- /Breadcrumb -->

<div class="container pt-30">

    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim">{{$brand->where('brand_status','review')->count()}}</span> Merchant</span>
                                                <span class="capitalize-font block">Review</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class=" ti-eye   data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                        {{--<div class="progress-anim">--}}
                                        {{--<div class="progress">--}}
                                        {{--<div class="progress-bar progress-bar-orange--}}
                                        {{--wow animated progress-animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim">{{$brand->where('brand_status','aktif')->count()}}</span> Merchant</span>
                                                <span class="capitalize-font block">Aktif</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="ti-link   data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                        {{--<div class="progress-anim">--}}
                                        {{--<div class="progress">--}}
                                        {{--<div class="progress-bar progress-bar-orange--}}
                                        {{--wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim">{{$brand->where('brand_status','blacklist')->count()}}</span> Merchant</span>
                                                <span class="capitalize-font block">Blacklist</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class=" ti-na   data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                        {{--<div class="progress-anim">--}}
                                        {{--<div class="progress">--}}
                                        {{--<div class="progress-bar progress-bar-orange--}}
                                        {{--wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim">{{$brand->where('brand_status','non_aktif')->count()}}</span> Merchant</span>
                                                <span class="capitalize-font block">Non Aktif</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="ti-unlink   data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                        {{--<div class="progress-anim">--}}
                                        {{--<div class="progress">--}}
                                        {{--<div class="progress-bar progress-bar-orange--}}
                                        {{--wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default border-panel card-view panel-refresh">
                        <div class="refresh-container">
                            <div class="la-anim-1"></div>
                        </div>
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Pesanan</h6>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body row pa-0">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        @if($order_list->count() > 0)
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Konsumen</th>
                                                    <th>Brand</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($order_list as $ord) : ?>


                                                @csrf
                                                <tbody>
                                                    <tr>
                                                        <td><span class="txt-dark weight-500">{{$ord->id}}</span></td>
                                                        <td>{{$ord->konsumen->konsumen_nama}}</td>
                                                        <td>{{$ord->brand->brand_nama}}</td>
                                                        <?php
                                                            $total = 0;
                                                            foreach ($ord->order_detail as $item) :
                                                                $total = $total + ($item->pivot->qty * ($item->pivot->harga - ($item->pivot->harga * ($item->pivot->discount / 100))));
                                                            endforeach;
                                                            $total = $total + $ord->order_biaya_anatar;
                                                            ?>
                                                        <td><?php echo to_rupiah($total) ?></td>
                                                        <td>
                                                            @if($ord->order_status == 'Proses')
                                                            <span class="label label-warning">Proses</span>
                                                            @elseif($ord->order_status == 'Pengantaran')
                                                            <span class="label label-primary">Pengantaran</span>
                                                            @elseif($ord->order_status == 'Selesai')
                                                            <span class="label label-success">Selesai</span>
                                                            @elseif($ord->order_status == 'Batal')
                                                            <span class="label label-danger">Batal</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                        </table>
                                        @else
                                        <p> Tidak Ada Pesanan</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default border-panel card-view panel-refresh">
                        <div class="refresh-container">
                            <div class="la-anim-1"></div>
                        </div>
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Total Masuk</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="flex-stat flex-stat-3 text-center">
                                    <span class="block"><span class="initial">Rp </span><span class="txt-orange weight-300 counter-anim data-rep"><?php echo convert_to_rupiah($saldo->balance) ?></span></span>
                                    <span class="block">Total Wallet Balance</span>
                                </div>
                                <hr class="light-grey-hr row mt-10 mb-15" />
                                <div class="label-chatrs">
                                    <div class="">
                                        <div class="pull-left"><span class="pull-left txt-dark capitalize-font pl-10 pt-5">Penghasilan Hari Ini</span></div>
                                        <span class="clabels-text font-12 inline-block txt-dark text-right capitalize-font pull-right"><span class="block font-15 mb-5"><?php echo to_rupiah($penghasilanHariIni->sum('biaya')) ?></span><span class="block txt-grey">{{$penghasilanHariIni->count()}} Order</span><span> <a href="{{url('/admin/profitharian')}}">Lihat detail</a></span></span></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <hr class="light-grey-hr row mt-10 mb-15" />
                                <div class="label-chatrs">
                                    <div class="">
                                        <div class="pull-left"><span class="pull-left txt-dark capitalize-font pl-10 pt-5">Penghasilan Bulan Ini</span></div>
                                        <span class="clabels-text font-12 inline-block txt-dark text-right capitalize-font pull-right"><span class="block font-15 mb-5"><?php echo to_rupiah($penghasilanBulanIni->sum('biaya')) ?></span><span class="block txt-grey">{{$penghasilanBulanIni->count()}} Order</span><span> <a href="{{url('/admin/profitbulanan')}}">Lihat detail</a></span></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@stop