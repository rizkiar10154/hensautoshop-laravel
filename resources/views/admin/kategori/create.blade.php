@extends('admin.layout.base_template_admin')


@section('main')
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Kategori Baru</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{url('/operator')}}">Dashboard</a></li>
            <li><a href="{{url('/admin/kategori')}}">Kategori</a></li>
            <li class="active"><span>Tambah Kategori</span></li>
        </ol>
    </div>
    <!-- /Breadcrumb -->
</div>





<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        @include('admin.layout.flash_mesage')
        @include('hensautoshop.layout.Error')
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Insert Kategori Baru</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        {!!Form::open(['url'=>'admin/kategori']) !!}
                        <div class="form-group">
                            <label class="control-label mb-10" for="email_de">Nama Kategori:</label>
                            {!! Form::text('kategori_nama',null,['class' =>'form-control','placeholder' =>'Nama dari kategori baru']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10" for="pwd_de">Deskripsi:</label>
                            {!! Form::textarea('kategori_deskripsi',null,['class' =>'form-control','placeholder' =>'Deskripsi singkat kategori', 'rows'=>'3']) !!}
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection