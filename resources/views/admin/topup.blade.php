@extends('admin.layout.base_template_admin')



@section('main')

<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Top Up Saldo</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{url('/operator')}}">Dashboard</a></li>
            <li class="active"><span>Top Up</span></li>
        </ol>
    </div>
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
                    <h6 class="panel-title txt-dark">Top Up Saldo</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        {!!Form::open(['url'=>'admin/topup']) !!}
                        <div class="from-group-horizontal">
                            <label class="control-label mb-10" for="email_de">Jenis Pengguna:</label>
                            <div class="radio radio-info">
                                <input type="radio" name="tipe" id="radio1" value="Brand" checked="">
                                <label for="radio1">
                                    Brand
                                </label>
                            </div>
                            <div class="radio radio-info">
                                <input type="radio" name="tipe" id="radio2" value="Konsumen" checked="">
                                <label for="radio2">
                                    Konsumen
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10" for="email_de">No Handphone:</label>
                            {!! Form::text('phone_number',null,['class' =>'form-control','placeholder' =>'Masukan Nomor Handphone ex: 6281268475430']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10" for="pwd_de">Nominal:</label>
                            {!! Form::text('value',null,['class' =>'form-control','placeholder' =>'Nominal Top Up']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10" for="pwd_de">Ulangi Nominal Trasfer:</label>
                            {!! Form::text('konfirmasi_value',null,['type'=>'numbers','class' =>'form-control','placeholder' =>'Ulangi Nominal Transfer']) !!}
                        </div>


                        {!! Form::hidden('id',Auth::user()->id) !!}

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop