<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="#">
    <title>Hensautoshop</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('hensautoshop/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('hensautoshop/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('hensautoshop/css/animsition.min.css')}}" rel="stylesheet">
    <link href="{{asset('hensautoshop/css/animate.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('hensautoshop/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/bower_components/multiselect/css/multi-select.css')}}" rel="stylesheet">

</head>


<body class="home">
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        @include('hensautoshop.layout.navigation')
        <div class="page-wrapper">
            @yield('main')





            @include('hensautoshop.layout.footer')
        </div>
    </div>
    <!--/end:Site wrapper -->
    <!-- Bootstrap core JavaScript
================================================== -->

    <script src="{{asset('hensautoshop/js/jquery.min.js')}}"></script>
    <script src="{{asset('hensautoshop/js/tether.min.js')}}"></script>
    <script src="{{asset('hensautoshop/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('hensautoshop/js/animsition.min.js')}}"></script>
    <script src="{{asset('hensautoshop/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{asset('hensautoshop/js/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('hensautoshop/js/headroom.js')}}"></script>
    @yield('src')


    <script src="{{asset('hensautoshop/js/foodpicky.js')}}"></script>
    <script src="{{asset('operator/dist/js/form-advance-data.js')}}"></script>

    <script src="{{asset('operator/dist/js/init.js')}}"></script>

    <script src="{{asset('vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('vendors/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>




</body>

</html>