<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png"> -->
    <title>{{ PROJECT_NAME }} Admin- @yield('title')</title>
    <!-- Custom CSS -->
    <!-- <link href="{{ url( backEndCssPath.'/style.css') }}" rel="stylesheet"> -->
    <link href="{{ url( backEndCssPath.'/fullcalendar.min.css') }}" rel="stylesheet"/>
    <link href="{{ url( backEndCssPath.'/calendar.css') }}" rel="stylesheet" />
    <link href="{{ url( backEndCssPath.'/style.min.css') }}" rel="stylesheet">
    <link href="{{ url( backEndCssPath.'/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url( backEndCssPath.'/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ url( backEndCssPath.'/steps.css') }}" rel="stylesheet">
    <link href="{{ url( backEndCssPath.'/dataTables.bootstrap4.css') }}" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{ url( backEndCssPath.'/bootstrap-datepicker.css') }}">
    <link href="{{url( backEndCssPath.'/multiple-select.css') }}" rel="stylesheet">
    <link href="{{ url( backEndCssPath.'/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ url( backEndCssPath.'/developer.css') }}" rel="stylesheet">
    <script src="{{ url( backEndJsPath.'/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url( backEndJsPath.'/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ url( backEndJsPath.'/sweetalert.min.js') }}"></script>
    <script src="{{ url('public/backEnd/js/common.js') }}" type="text/javascript"></script>

</head>

<body>
    <div class="preloader loader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    
    <div id="main-wrapper">
        @include('backEnd.common.header')
        @include('backEnd.common.sidebar')

        @yield('content')
    </div>
    
    <script src="{{ url( backEndJsPath.'/popper2.min.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/bootstrap.min.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/sparkline.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/waves.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/sidebarmenu.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/custom.js') }}"></script>    
    <script src="{{ url( backEndJsPath.'/excanvas.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/jquery.flot.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/jquery.flot.pie.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/jquery.flot.time.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/jquery.flot.stack.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/chart-page-init.js') }}"></script>
    <!-- <script src="{{ url( backEndJsPath.'/select2.min.js') }}"></script> -->
    <script src="{{ url( backEndJsPath.'/datatable-checkbox-init.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/jquery.multicheck.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/datatables.min.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/toastr.min.js') }}"></script>


    

    @include('backEnd.common.notifications')
    <script>
        $('#zero_config').DataTable();
        $('#zero_config1').DataTable();
    </script>
    @yield('scripts')
</body>

</html>