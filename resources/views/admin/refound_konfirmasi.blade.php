@extends('admin.layout.base_template_admin')



@section('main')

<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Konfirmasi Refound Saldo</h5>
    </div>
    {{--<!-- Breadcrumb -->--}}
    {{--<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">--}}
    {{--<ol class="breadcrumb">--}}
    {{--<li><a href="{{url('/admin')}}">Dashboard</a></li>--}}
    {{--<li class="active"><span>Refound</span></li>--}}
    {{--</ol>--}}
    {{--</div>--}}
    <!-- /Breadcrumb -->
</div>





<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        @include('admin.layout.flash_error')
        @include('admin.layout.flash_mesage')
        @include('hensautoshop.layout.Error')
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Refound Saldo</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                @if($succes)
                <div class="panel-body">
                    <h6 align="center"> Anda Akan Menarik Saldo Sebesar Rp.{{$value}} </h6>
                    <h6 align="center"> Atas Nama <mark>{{$nama}}</mark></h6>

                </div>
                @endif



                <div class="panel-body">
                    <div class="form-wrap">
                        {!!Form::open(['url'=>'admin/refound/konfirmasi']) !!}
                        <div class="from-group-horizontal">

                            {!! Form::hidden('tipe',$tipe,['class' =>'form-control','placeholder' =>'Masukan Nomor Handphone ex: 6281268475430']) !!}
                        </div>
                        <div class="form-group">

                            {!! Form::hidden('phone_number',$phone_number,['class' =>'form-control','placeholder' =>'Masukan Nomor Handphone ex: 6281268475430']) !!}
                        </div>
                        <div class="form-group">

                            {!! Form::hidden('value',$value,['class' =>'form-control','placeholder' =>'Nominal Top Up']) !!}
                        </div>

                        {!! Form::hidden('id',Auth::user()->id) !!}
                        <div class="col-sm-offset-6">
                            <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop