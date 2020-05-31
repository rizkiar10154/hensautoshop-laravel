@extends('admin.layout.base_template_admin')

<?php

function convert_to_rupiah($angka)
{
    $agk =   substr($angka, 0, -3);
    return       'Rp.' . strrev(implode('.', str_split(strrev(strval($agk)), 3)));
}

function to_rupiah($angka)
{

    return       'Rp.' . strrev(implode('.', str_split(strrev(strval($angka)), 3)));
}


?>

@section('main')

<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Order</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{url('/operator')}}">Dashboard</a></li>
            <li class="active"><span>Order</span></li>
        </ol>
    </div>
    <!-- /Breadcrumb -->
</div>



<div class="row">
    <div class="col-sm-12">

        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h5 class="txt-dark">Daftar Rekomendasi</h5>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="">
                            @if($order_list->count() > 0)
                            <table id="myTable1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th data-sort-initial="true" data-toggle="true">ID</th>
                                        <th>Nama Konsumen</th>
                                        <th>Nama Brand</th>
                                        <th>Order LatLang</th>
                                        <th>Alamat</th>
                                        <th>Catatan</th>
                                        <th>Mtode Bayar</th>
                                        <th>Jarak Antar</th>
                                        <th>Biaya Antar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                {{--<tfoot>--}}
                                {{--<tr>--}}
                                {{--<th >ID</th>--}}
                                {{--<th>Nama Konsumen</th>--}}
                                {{--<th>Nama Brand</th>--}}
                                {{--<th>Order LatLang</th>--}}
                                {{--<th>Alamat</th>--}}
                                {{--<th>Catatan</th>--}}
                                {{--<th>Mtode Bayar</th>--}}
                                {{--<th>Jarak Antar</th>--}}
                                {{--<th>Biaya Antar</th>--}}
                                {{--<th>Status</th>--}}
                                {{--<th>Aksi</th>--}}
                                {{--</tr>--}}
                                {{--</tfoot>--}}
                                <tbody>
                                    <?php foreach ($order_list as $order) : ?>


                                        @csrf
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->konsumen->konsumen_nama}}</td>
                                            <td>{{$order->brand->brand_nama}}</td>
                                            <td>{{$order->order_lat}}<br>
                                                {{$order->order_long}}</td>
                                            <td>{{$order->order_alamat}}</td>
                                            <td>{{!empty($order->order_catatan) ? $order->order_catatan :'-'}}</td>
                                            <td>
                                                @if($order->order_metode_bayar == 'cash')
                                                <span class="label label-primary">Cash</span>
                                                @else
                                                <span class="label label-danger">epay</span>
                                                @endif</td>
                                            </td>
                                            <td>{{$order->order_jarak_antar}} Km</td>
                                            <?php
                                                $total = 0;
                                                foreach ($order->order_detail as $item) :
                                                    $total = $total + ($item->pivot->qty * ($item->pivot->harga - ($item->pivot->harga * ($item->pivot->discount / 100))));
                                                endforeach;
                                                $total = $total + $order->order_biaya_anatar;
                                                ?>
                                            <td><?php echo to_rupiah($total) ?></td>
                                            <td>{{$order->order_status}}</td>
                                            <td>
                                                <form action="{{ route('detail_order', $order->id) }}" method="GET" style='float: left; padding-top: 30px'>
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-success btn-xs">Detail Order</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            @else
                            <p> Tidak Ada Kategori</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop