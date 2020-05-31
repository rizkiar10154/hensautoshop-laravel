@extends('admin.layout.base_template_admin')

@section('src')
<link href="{{ asset('vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@stop

<?php

function convert_to_rupiah($angka)
{
    $agk =   substr($angka, 0, -3);
    return       'Rp. ' . strrev(implode('.', str_split(strrev(strval($agk)), 3)));
}

function to_rupiah($angka)
{

    return       'Rp. ' . strrev(implode('.', str_split(strrev(strval($angka)), 3)));
}


?>

@section('main')

<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Registrasi Baru</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{url('/operator')}}">Dashboard</a></li>
            <li class="active"><span>Accesories</span></li>
        </ol>
    </div>
    <!-- /Breadcrumb -->
</div>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h5 class="txt-dark">Daftar Restoran Baru</h5>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="">
                            @if($order->order_detail ->count() > 0)
                            <table id="myTable1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>

                                        <th>Nama Accesories</th>
                                        <th>Kategori</th>
                                        <th data-sorting="false">Foto</th>
                                        <th>Accesories Harga</th>
                                        <th data-sorting="false">Discount(@)</th>
                                        <th data-sorting="false">Qty</th>
                                        <th data-sorting="false">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($order->order_detail  as $accesories) : ?>


                                        @csrf
                                        <tr>

                                            <td>{{$accesories->accesories_nama}}</td>
                                            <td>{{$accesories->kategori->kategori_nama}}</td>
                                            <td><img src="{{asset('fotoaccesories/'.$accesories->accesories_foto)}}" alt="{{$accesories->accesories_foto}}" width="70" height="95"></td>
                                            <td>{{$accesories->pivot->harga}}</td>
                                            <td> @if($accesories->pivot->discount == '0.00')
                                                -
                                                @else
                                                <span class="label label-default">{{$accesories->pivot->discount }} %</span>
                                                @endif
                                            </td>
                                            <td>{{$accesories->pivot->qty}}</td>
                                            <td><?php echo to_rupiah($accesories->pivot->qty * ($accesories->pivot->harga - ($accesories->pivot->harga * ($accesories->pivot->discount / 100)))) ?></td>


                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            @else
                            <p> Tidak Ada Registrasi</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop





@section('js')
<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('operator/dist/js/responsive-datatable-data.js')}}"></script>
@stop