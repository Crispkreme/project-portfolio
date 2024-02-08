<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Upcube - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <link href="{{ asset('css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet" type="text/css" />

    @stack('styles')

</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.body.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.body.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        
        <div class="main-content">

            {{ $slot }}

            @include('admin.body.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/waves.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-us-merc-en.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.init.js') }}"></script>
    <script src="{{ asset('js/datatables.init.js') }}"></script>
    <script src="{{ asset('js/form-editor.init.js') }} "></script>
    <script src="{{ asset('js/theme.min.js') }} "></script>
    <script src="{{ asset('js/tinymce.min.js') }} "></script>
    <script src="{{ asset('js/code.js') }}"></script>
    <script src="{{ asset('js/validate.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @stack('scripts')

    <!-- App js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
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

</body>

</html>
