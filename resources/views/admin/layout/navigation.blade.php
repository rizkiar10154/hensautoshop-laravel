<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span>
            <hr />
        </li>
        <li>
            <a href="{{url('/admin')}}" data-toggle="collapse" data-target="#dashboard_dr">
                <div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/registrasi')}}" data-toggle="collapse" data-target="#ecom_dr">
                <div class="pull-left"><i class="ti-id-badge   mr-20"></i><span class="right-nav-text">Registrasi</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/rekomendasi')}}" data-toggle="collapse" data-target="#ecom_dr">
                <div class="pull-left"><i class="ti-announcement   mr-20"></i><span class="right-nav-text">Rekomendasi</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/contact')}}" data-toggle="collapse" data-target="#ecom_dr">
                <div class="pull-left"><i class="ti-comments    mr-20"></i><span class="right-nav-text">Pesan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr">
                <div class="pull-left"><i class="ti-wallet  mr-20"></i><span class="right-nav-text">Transaction</span></div>
                <div class="pull-right"><i class="ti-angle-down"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="app_dr" class="collapse collapse-level-1">
                <li>
                    <a href="{{url('/admin/topup')}}">Top Up</a>
                </li>
                <li>
                    <a href="{{url('/admin/refound')}}">Refound</a>
                </li>
                <li>
                    <a href="{{url('/admin/riwayat_henspay')}}">Riwayat</a>
                </li>
                {{--<li>--}}
                {{--<a href="weather.html">collect</a>--}}
                {{--</li>--}}

            </ul>
        </li>
        <li class="navigation-header mt-20">
            <span>Master</span>
            <hr />
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr">
                <div class="pull-left"><i class="ti-server   mr-20"></i><span class="right-nav-text">Data Master</span></div>
                <div class="pull-right"><i class="ti-angle-down "></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{url('/admin/kategori')}}">Kategori</a>
                </li>
                <li>
                    <a href="{{url('/admin/brand')}}">Brand</a>
                </li>
                <li>
                    <a href="{{url('/admin/konsumen')}}">Konsumen</a>
                </li>
                <li>
                    <a href="{{url('/admin/satuan')}}">Satuan</a>
                </li>


            </ul>
        </li>
        <li>
            <a href="{{url('/admin/order')}}" data-toggle="collapse" data-target="#comp_dr">
                <div class="pull-left"><i class="ti-agenda   mr-20"></i><span class="right-nav-text">Order</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        {{--<li class="navigation-header mt-20">--}}
        {{--<span>featured</span>--}}
        {{--<hr/>--}}
        {{--</li>--}}


    </ul>
</div>