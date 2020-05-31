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
        {{--<h5 class="txt-dark">Profit Bulananan</h5>--}}
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}">Dashboard</a></li>

            <li class="active"><span>Profit Bulanan</span></li>
        </ol>
    </div>
    <!-- /Breadcrumb -->
</div>



<div class="row">
    <div class="col-sm-12">

        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h5 class="txt-dark">Profit Bulanan</h5>
                </div>


                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="">
                            @if($dataProfitBulanan->count() > 0)
                            <table id="myTable1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th data-sort-initial="true" data-toggle="true">Bulan</th>
                                        <th data-sort-initial="true" data-toggle="true">Keuntungan</th>


                                    </tr>
                                </thead>
                                {{--<tfoot>--}}
                                {{--<tr>--}}
                                {{--<th >ID</th>--}}
                                {{--<th>Nama Konsumen</th>--}}
                                {{--<th>Phone</th>--}}
                                {{--<th>Email</th>--}}
                                {{--<th>Balance</th>--}}
                                {{--<th>Jml Pesan</th>--}}
                                {{--<th>Jml Pesan Selesai</th>--}}
                                {{--<th>Jml Pesan Batal</th>--}}
                                {{--<th>Tgl Buat</th>--}}
                                {{--<th>Tgl Edit</th>--}}
                                {{--<th></th>--}}
                                {{--</tr>--}}
                                {{--</tfoot>--}}
                                <tbody>
                                    <?php foreach ($dataProfitBulanan as $item) : ?>
                                        @csrf
                                        <tr>

                                            <td>{{$item->months}}</td>

                                            <td><?php echo convert_to_rupiah($item->total) ?></td>


                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            @else
                            <p> Tidak Ada Penghasilan</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop