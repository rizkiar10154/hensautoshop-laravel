<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Hensauto Admin</title>
    <meta name="description" content="Admintres is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Admintres Admin, Admintresadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
    <!-- Data table CSS -->
    <link href="{{asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css')}}" rel="stylesheet" type="text/css" />


    <!-- Morris Charts CSS -->
    <link href="{{asset('vendors/bower_components/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />

    <!-- Chartist CSS -->
    <link href="{{asset('vendors/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet" type="text/css" />


    <!-- vector map CSS -->
    <link href="{{asset('vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" type="text/css" />


    <!-- Custom CSS -->
    <link href="{{asset('operator/dist/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->
    <div class="wrapper theme-2-active navbar-top-light">
        <!-- Top Menu Items -->
        @include('admin.layout.navigation_top')
        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
        @include('admin.layout.navigation')
        <!-- /Left Sidebar Menu -->

        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container">

                @yield('main')


                <!-- Footer -->
                @include('admin.layout.footer')
                <!-- /Footer -->
            </div>
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->



    <!-- jQuery -->
    <script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Data table JavaScript -->
    <script src="{{asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('operator/dist/js/responsive-datatable-data.js')}}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{asset('operator/dist/js/jquery.slimscroll.js')}}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{asset('operator/dist/js/dropdown-bootstrap-extended.js')}}"></script>

    <!-- Owl JavaScript -->
    <script src="{{asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>

    <!-- Switchery JavaScript -->
    <script src="{{asset('vendors/bower_components/switchery/dist/switchery.min.js')}}"></script>

    <!-- Sparkline JavaScript -->
    <script src="{{asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>

    <!-- Vector Maps JavaScript -->
    <script src="{{asset('vendors/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('vendors/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{asset('vendors/vectormap/jquery-jvectormap-world-mill-en')}}.js"></script>
    <script src="{{asset('operator/dist/js/vectormap-data.js')}}"></script>


    <!-- Piety JavaScript -->
    <script src="{{asset('vendors/bower_components/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('operator/dist/js/peity-data.js')}}"></script>

    <!-- Chartist JavaScript -->
    <script src="{{asset('vendors/bower_components/chartist/dist/chartist.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('vendors/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('vendors/bower_components/morris.js/morris.min.js')}}"></script>
    {{--<script src="{{asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>--}}

    <!-- ChartJS JavaScript -->
    <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>




    <!-- Init JavaScript -->
    <script src="{{asset('operator/dist/js/init.js')}}"></script>
    <script src="{{asset('operator/dist/js/dashboard-data.js')}}"></script>

</body>

</html>