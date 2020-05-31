@extends('admin.layout.base_template_admin')

<?php

function convert_to_rupiah($angka)
{
    $agk =   substr($angka, 0, -3);
    return       'Rp. ' . strrev(implode('.', str_split(strrev(strval($agk)), 3)));
}


?>

@section('main')

<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Riwayat Transaksi</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{url('/operator')}}">Dashboard</a></li>
            <li class="active"><span>Riwayat Henspay</span></li>
        </ol>
    </div>
    <!-- /Breadcrumb -->
</div>



<div class="row">
    <div class="col-sm-12">

        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h5 class="txt-dark">Daftar Riwayat</h5>
                </div>


                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="">
                            @if($riwayat_list->count() > 0)
                            <table id="myTable1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th data-sort-initial="true" data-toggle="true">ID</th>
                                        <th>Penerima</th>
                                        <th>Nominal</th>
                                        <th>Pengirim</th>
                                        <th>Jenis Transaksi</th>
                                        <th>Tgl Transaksi</th>
                                        {{--<th>Aksi</th>--}}
                                    </tr>
                                </thead>
                                {{--<tfoot>--}}
                                {{--<tr>--}}
                                {{--<th >ID</th>--}}
                                {{--<th>Nama Brand</th>--}}
                                {{--<th>Phone</th>--}}
                                {{--<th>Alamat</th>--}}
                                {{--<th>tgl Rekomendasi</th>--}}
                                {{--</tr>--}}
                                {{--</tfoot>--}}
                                <tbody>
                                    <?php foreach ($riwayat_list as $riwayat) : ?>


                                        @csrf
                                        <tr>
                                            <td>{{$riwayat->id}}</td>
                                            <td>+{{$riwayat->penerima_phone}} - {{$riwayat->penerima_tipe}}</td>
                                            <td><?php echo convert_to_rupiah($riwayat->nominal) ?></td>
                                            <td>{{$riwayat->pengirim_tipe}}</td>
                                            <td>
                                                @if($riwayat->jenis_transaksi == 'topup')
                                                <span class="label label-warning">{{$riwayat->jenis_transaksi}}</span>
                                                @else
                                                <span class="label label-primary">{{$riwayat->jenis_transaksi}}</span>
                                                @endif
                                            </td>
                                            <td>{{$riwayat->created_at->format('d/m/Y H:m:s')}}</td>
                                            {{--<td>--}}
                                            {{--<form action="{{ route('detail_riwayat', $riwayat->id) }}" method="GET" style ='float: left; padding-top: 30px' >--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--<button type="submit" class="btn btn-success  btn-xs" >Detail</button>--}}
                                            {{--</form>--}}
                                            {{--</td>--}}
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            @else
                            <p> Tidak Ada Riwayat</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop