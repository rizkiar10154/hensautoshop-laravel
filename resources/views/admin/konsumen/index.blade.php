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
        <h5 class="txt-dark">Kategori Konsumen</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="active"><span>Konsumen</span></li>
        </ol>
    </div>
    <!-- /Breadcrumb -->
</div>



<div class="row">
    <div class="col-sm-12">

        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h5 class="txt-dark">Daftar Konsumen</h5>
                </div>


                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="">
                            @if($konsumen_list->count() > 0)
                            <table id="myTable1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th data-sort-initial="true" data-toggle="true">ID</th>
                                        <th>Nama Konsumen</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Balance</th>
                                        <th>Jml Pesan</th>
                                        <th>Jml Pesan Selesai</th>
                                        <th>Jml Pesan Batal</th>
                                        <th>Tgl Buat</th>
                                        <th>Tgl Edit</th>
                                        <th></th>
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
                                    <?php foreach ($konsumen_list as $konsumen) : ?>


                                        @csrf
                                        <tr>
                                            <td>{{$konsumen->id}}</td>
                                            <td>{{$konsumen->konsumen_nama}}</td>
                                            <td>+{{$konsumen->konsumen_phone}}</td>
                                            <td>{{$konsumen->konsumen_email}}</td>
                                            <td><?php echo convert_to_rupiah($konsumen->konsumen_balance) ?></td>
                                            <td>{{$konsumen->order->count()}}</td>
                                            <td>{{$konsumen->order->where('order_status','selesai')->count()}}</td>
                                            <td>{{$konsumen->order->where('order_status','batal')->count()}}</td>
                                            <td>{{$konsumen->created_at->format('d/m/Y H:m:s')}}</td>
                                            <td>{{$konsumen->updated_at->format('d/m/Y H:m:s')}}</td>
                                            <td></td>
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