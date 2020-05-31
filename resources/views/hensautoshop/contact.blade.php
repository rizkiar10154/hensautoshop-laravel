@extends('hensautoshop.layout.template ')

@section('main')
<!-- start: Inner page hero -->

<section class="bg-image space-md" data-image-src="{{asset('hensautoshop/images/logoawal.jpg')}}">
    <div class="profile">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4  col-lg-4 profile-img">
                    <h1 class="font-white">Hubungi Kami</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end:Inner page hero -->
<div class="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="#" class="active">Home</a></li>
            {{--<li><a href="#">Search results</a></li>--}}
            <li>Kontak</li>
        </ul>
    </div>
</div>
<section class="contact-page inner-page">
    <div class="container">
        <div class="row">
            <!-- REGISTER -->
            <div class="col-md-8">

                @include('hensautoshop.layout.flash_mesage')
                @include('hensautoshop.layout.Error')

                <div class="widget">
                    <div class="widget-body">
                        <!-- Contact form -->

                        {!!Form::open(['url'=>'contact']) !!}

                        <fieldset>
                            <div class="row form-group">
                                <div class="col-xs-6">

                                    {!! Form::text('nama',null,['class' =>'form-control','placeholder' =>'Nama *']) !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::text('kota',null,['class' =>'form-control','placeholder' =>'Kota *']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-xs-6">
                                    {!! Form::text('email',null,['class' =>'form-control','placeholder' =>'Alamt Email *']) !!}
                                </div>
                                <div class="col-xs-6">
                                    {!! Form::text('phone',null,['class' =>'form-control','placeholder' =>'Nomor Telepon *']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-xs-12">
                                    {!! Form::text('subjek',null,['class' =>'form-control','placeholder' =>'Subjek *']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-xs-12">

                                    {!! Form::textarea('pesan',null,['class' =>'form-control','rows'=>'10','placeholder' =>'Pesan *']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-xs-12">
                                    <Input class="btn btn-lg theme-btn" type="submit" value="kirim Pesan">
                                </div>
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                        <!-- End Contact form -->
                    </div>
                </div>
                <!-- end: Widget -->
            </div>
            <!-- /REGISTER -->

        </div>
    </div>
</section>

@stop