@extends('hensautoshop.layout.template')

@section('main')

<div class="inner-page-hero bg-image space-md" data-image-src="{{asset('hensautoshop/images/logoawal.jpg')}}">
    <div class="container text-xs-center m-b-20">
        <h1 class="font-white">Bergabung Bersama Hensautoshop</h1>
        <p class="font-white">Temukan konsumen dan tingkatkan potensi usaha anda</p>
    </div>
</div>
<!-- end:Inner page hero -->
<div class="pricing-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 col-sm-4">
                <div class="pricing-box">

                    <h2>Hensautoshop</h2>
                    <p>Layanan Gratis</p>
                    <ul data-cloneable="" data-group="" class="">
                        <li>Tanpa biaya Pendaftaran</li>
                        <li>Tanpa Biaya Bulanan</li>
                        <li>Tanpa Batas Pesanan</li>
                        {{--<li>Gain exposure</li>--}}
                    </ul>
                    <div data-group=""> <a href="{{url('/register/create')}}" class="btn theme-btn">Daftar Sekarang</a> </div>
                </div>
            </div>
            {{--<div class="col-md-5 col-sm-6">--}}
            {{--<div class="pricing-box">--}}
            {{--<span class="price">--}}
            {{--<span class="currency">Rp</span>20000</span>--}}
            {{--<h2>Premium plan</h2>--}}
            {{--<p>Sign up for premium plan</p>--}}
            {{--<ul data-cloneable="" data-group="" class="">--}}
            {{--<li>No joining fees</li>--}}
            {{--<li>Unlimited orders per month</li>--}}
            {{--<li>Get noticed</li>--}}
            {{--<li>Gain exposure</li>--}}
            {{--</ul>--}}
            {{--<div data-group=""> <a href="{{url('/register/create')}}" class="btn theme-btn">Sign up now</a>
        </div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
    <!-- end:row -->

</div>
</div>
</div>
<!-- end:Container -->
</div>

@stop