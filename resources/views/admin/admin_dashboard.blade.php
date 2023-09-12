<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('adminbackend/assets/images/favicon.ico') }}" type="image/ico" />

    <title>{{ trans('trans.admin') }}</title>

        <link href="{{ asset('adminbackend/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('adminbackend/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ asset('adminbackend/assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
        <!-- iCheck -->
        <link href="{{ asset('adminbackend/assets/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="{{ asset('adminbackend/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{{ asset('adminbackend//vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="{{ asset('adminbackend/assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{ asset('adminbackend/assets/build/css/custom.min.css') }}" rel="stylesheet">



        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
        <link href="{{ asset('adminbackend/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('adminbackend/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('adminbackend/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('adminbackend/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('adminbackend/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    </head>

    <body class="nav-md">
    <div class="container body">
        <div class="main_container">

            @include('admin.body.sidebar')

            <!-- top navigation -->
            @include('admin.body.header')
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @yield('admin')
            </div>

            <!-- /page content -->

            <!-- footer content -->
            @include('admin.body.footer')
            <!-- /footer content -->
        </div>
    </div>





    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>




    <script src="{{ asset('adminbackend/assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('adminbackend/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminbackend/assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('adminbackend/assets/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('adminbackend/assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('adminbackend/assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('adminbackend/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('adminbackend/assets/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('adminbackend/assets/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('adminbackend/assets/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('adminbackend/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('adminbackend/assets/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminbackend/assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('adminbackend/assets/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('adminbackend/assets/build/js/custom.min.js') }}"></script>




<!-- Datatables -->


<script src="{{ asset('adminbackend/assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}."></script>
<script src="{{ asset('adminbackend/assets/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <script src="{{ asset('backend/assets/js/index.js') }}"></script>
    <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
</body>
</html>
