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
            <li class="active"><span>Registrasi</span></li>
        </ol>
    </div>
    <!-- /Breadcrumb -->
</div>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h5 class="txt-dark">Daftar Brand Baru</h5>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="">
                            @if($brand_list->count() > 0)
                            <table id="myTable1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th data-sort-initial="true" data-toggle="true">ID</th>
                                        <th>tgl</th>
                                        <th>Nama Brand</th>
                                        <th data-sorting="false">Foto</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th data-sorting="false" data>Alamat</th>
                                        <th data-sorting="false">Tipe Delivery</th>
                                        <th data-sorting="false"> Tarif Delivery</th>
                                        <th data-sorting="false">Minimum Order</th>
                                        <th data-sorting="false">Jarak Maksimum</th>
                                        <th data-sorting="false">Tipe Accesories</th>
                                        <th data-sorting="false">Deskripsi</th>
                                        <th data-sorting="false">Pajak PB1</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                {{--<tfoot>--}}
                                {{--<tr>--}}
                                {{--<th>ID</th>--}}
                                {{--<th>Tgl</th>--}}
                                {{--<th>Nama Brand</th>--}}
                                {{--<th>Foto</th>--}}
                                {{--<th>Phone</th>--}}
                                {{--<th>Email</th>--}}
                                {{--<th>Alamat</th>--}}
                                {{--<th>Tipe Delivery</th>--}}
                                {{--<th>Tarif Delivery</th>--}}
                                {{--<th>Minimum Order</th>--}}
                                {{--<th>Jarak Maksimum</th>--}}
                                {{--<th>Tipe Accesories</th>--}}
                                {{--<th>Deskripsi</th>--}}
                                {{--<th></th>--}}
                                {{--</tr>--}}
                                {{--</tfoot>--}}
                                <tbody>
                                    <?php foreach ($brand_list as $brand) : ?>


                                        @csrf
                                        <tr>
                                            <td>{{$brand->id}}</td>
                                            <td>{{$brand->created_at->format('d/m/Y H:m:s')}}</td>
                                            <td><strong>{{$brand->brand_nama}}</strong></td>
                                            <td><img src="{{asset('fotobrand/'.$brand->brand_foto)}}" alt="{{$brand->brand_foto}}" width="70" height="95"></td>
                                            <td>+{{$brand->brand_phone}}</td>
                                            <td>{{$brand->brand_email}}</td>
                                            <td>{{$brand->brand_alamat}}</td>
                                            <td> @if($brand->brand_delivery == 'gratis')
                                                <span class="label label-warning">{{$brand->brand_delivery}}</span>
                                                @else
                                                <span class="label label-success">{{$brand->brand_delivery}}</span>
                                                @endif
                                            </td>
                                            <td>@if($brand->brand_delivery_tarif == 0)
                                                Gratis </span>
                                                @else
                                                <?php echo convert_to_rupiah($brand->brand_delivery_tarif) ?>
                                                @endif</td>
                                            <td><?php echo convert_to_rupiah($brand->brand_delivery_minimum) ?></td>
                                            <td>{{$brand->brand_delivery_jarak}}</td>
                                            <td>
                                                @foreach($brand->kategori as $kategori)
                                                <strong><span>{{$kategori->kategori_nama}},</span></strong>
                                                @endforeach
                                            </td>
                                            <td>{{$brand->brand_deskripsi}}</td>
                                            <td>@if($brand->brand_pajak_pb_satu == 0)
                                                Tidak dipungut pajak </span>
                                                @else
                                                {{$brand->brand_pajak_pb_satu}} %
                                                @endif</td>
                                            <td>


                                                <form action="{{ route('updateRegistrasi', $brand->id) }}" method="POST" style='float: left; padding-top: 30px'>
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <input type="hidden" name="brand_status" value="aktif">
                                                    <button type="submit" class="btn btn-success">Terima</button>
                                                </form>

                                                <form action="{{ route('updateRegistrasi', $brand->id) }}" method="POST" style='float: left;padding-top: 30px'>
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <input type="hidden" name="brand_status" value="tolak">
                                                    <button type="submit" class="btn btn-danger">Tolak </button>
                                                </form>

                                            </td>
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