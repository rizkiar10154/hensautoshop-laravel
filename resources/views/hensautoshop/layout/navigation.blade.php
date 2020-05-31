<!--header starts-->
<header id="header" class="header-scroll top-header headrom">
    <!-- .navbar -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="index.html"><img class="img-rounded" src="{{asset('hensautoshop/images/logosmall.png')}}" alt=""> </a>
            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    {{--Home Navigation--}}
                    @if(empty($halaman))
                    <li class="nav-item"> <a class="nav-link active" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a> </li>
                    @else
                    <li class="nav-item"> <a class="nav-link " href="{{url('/')}}">Home <span class="sr-only">(current)</span></a> </li>
                    @endif
                    {{--Daftar Navigation--}}
                    @if(!empty($halaman) && $halaman == 'daftar')
                    <li class="nav-item"> <a class="nav-link active" href="{{url('/daftar')}}">Brand Partner <span class="sr-only">(current)</span></a> </li>
                    @else
                    <li class="nav-item"> <a class="nav-link" href="{{url('/daftar')}}">Brand Partner <span class="sr-only">(current)</span></a> </li>
                    @endif
                    {{--Contact Navigation--}}
                    @if(!empty($halaman) && $halaman == 'contact')
                    <li class="nav-item "> <a class="nav-link active" href="{{url('/contact')}}">Hubungi Kami<span class="sr-only">(current)</span></a> </li>
                    @else
                    <li class="nav-item"> <a class="nav-link" href="{{url('/contact')}}">Hubungi Kami<span class="sr-only">(current)</span></a> </li>
                    @endif
                    {{--<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>--}}
                    {{--<div class="dropdown-menu"> <a class="dropdown-item" href="pricing.html">Pricing</a> <a class="dropdown-item" href="contact.html">Contact</a> <a class="dropdown-item" href="submition.html">Submit brand</a> <a class="dropdown-item" href="registration.html">Registration</a>--}}
                    {{--<div class="dropdown-divider"></div> <a class="dropdown-item" href="checkout.html">Checkout</a> </div>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.navbar -->
</header>