@extends('admin.layout.base_template_admin')

@section('src')
<link href="{{ asset('vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@stop

<?php

function convert_to_rupiah($angka)
{
    return 'Rp. ' . strrev(implode('.', str_split(strrev(strval($angka)), 3)));
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
            <li class="active"><span>Kontak</span></li>
        </ol>
    </div>
    <!-- /Breadcrumb -->
</div>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h5 class="txt-dark">Daftar Aduan Pelanggan</h5>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="">
                            @if($pesan_list->count() > 0)
                            <table id="myTable1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th data-sort-initial="true" data-toggle="true">ID</th>
                                        <th>Nama</th>
                                        <th>Subjek </th>
                                        <th>Phone </th>
                                        <th>Email</th>
                                        <th>Kota</th>
                                        <th>Tanggal</th>
                                        <th data-sorting="false" data>Pesan</th>
                                    </tr>
                                </thead>
                                {{--<tfoot>--}}
                                {{--<tr>--}}
                                {{--<th>ID</th>--}}
                                {{--<th>Nama</th>--}}
                                {{--<th>Subjek </th>--}}
                                {{--<th>Phone </th>--}}
                                {{--<th>Email</th>--}}
                                {{--<th>Kota</th>--}}
                                {{--<th>Tanggal</th>--}}
                                {{--<th data-sorting="false" data>Pesan</th>--}}
                                {{--</tr>--}}
                                {{--</tfoot>--}}
                                <tbody>
                                    <?php foreach ($pesan_list as $pesan) : ?>
                                        <tr>
                                            <td>{{$pesan->id}}</td>
                                            <td>{{$pesan->nama}}</td>
                                            <td>{{$pesan->subjek}} </td>
                                            <td>+{{$pesan->phone}}</td>
                                            <td>{{$pesan->email}}</td>
                                            <td>{{$pesan->kota}}</td>
                                            <td>{{$pesan->created_at->format('d/m/Y H:m:s')}}</td>
                                            <td data-sorting="false" data>{{$pesan->pesan}}</td>
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