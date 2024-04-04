<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Online Store</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link rel="stylesheet" href="{{ asset('assets/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/twitter-bootstrap-wizard/prettify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @stack('styles')

</head>

@if(Request::is('login'))
<body class="auth-body-bg">
@else
<body data-topbar="dark">
@endif

    {{ $slot }}
    
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/twitter-bootstrap-wizard/prettify.js') }}"></script>
    <script src="{{ asset('assets/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>
    <script src="{{ asset('assets/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('assets/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('assets/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/toastr/build/toastr.min.js') }}"></script>

    <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ asset('js/pages/form-editor.init.js') }}"></script>
    <script src="{{ asset('js/pages/datatables.init.js') }}"></script>
    
    <script src="{{ asset('js/handlebars.js') }}"></script>
    <script src="{{ asset('js/backend.js') }}"></script>
    
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type) {
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

    @stack('scripts')
    
</body>
</html>