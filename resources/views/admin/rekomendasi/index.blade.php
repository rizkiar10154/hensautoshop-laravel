@extends('admin.layout.base_template_admin')



@section('main')

<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Rekomendasi</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{url('/operator')}}">Dashboard</a></li>
            <li class="active"><span>Rekomendasi</span></li>
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
                            @if($rekomendasi_list->count() > 0)
                            <table id="myTable1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th data-sort-initial="true" data-toggle="true">ID</th>
                                        <th>Nama Brand</th>
                                        <th>Phone</th>
                                        <th>Alamat</th>
                                        <th>tgl Rekomendasi</th>
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
                                    <?php foreach ($rekomendasi_list as $rekomendasi) : ?>


                                        @csrf
                                        <tr>
                                            <td>{{$rekomendasi->id}}</td>
                                            <td>{{$rekomendasi->nama_brand}}</td>
                                            <td>+{{$rekomendasi->number_phone}}</td>
                                            <td>{{$rekomendasi->alamat}}</td>
                                            <td>{{$rekomendasi->created_at->format('d/m/Y H:m:s')}}</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            @else
                            <p> Tidak Ada Rekomendasi</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop