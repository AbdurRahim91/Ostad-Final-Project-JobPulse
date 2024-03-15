<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minia/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Feb 2022 18:00:34 GMT -->

<head>

    <meta charset="utf-8" />
    <title>JobPulse|| Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->

    <link rel="shortcut icon" href="{{ asset('backend/assets/images') }}/favicon.ico">

    <!-- plugin css -->
    <link href="{{ asset('backend/assets/libs') }}/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css') }}/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css') }}/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css') }}/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css') }}/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
 
</head>

<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('dashboard.components.header')
        @include('dashboard.components.sidbar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('main_content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('dashboard.components.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    @include('dashboard.components.rightbar')

    @include('dashboard.components.jslink')

</body>


</html>
