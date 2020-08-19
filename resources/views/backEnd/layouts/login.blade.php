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
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>{{ PROJECT_NAME }} - @yield('title')</title>
    <!-- Custom CSS -->
    <link href="{{ url( backEndCssPath.'/style.css') }}" rel="stylesheet">
    <link href="{{ url( backEndCssPath.'/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ url( backEndCssPath.'/developer.css') }}" rel="stylesheet">

    <script src="{{ url( backEndJsPath.'/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url( backEndJsPath.'/jquery.validate.js') }}"></script>
    <!-- <script src="{{ url( backEndJsPath.'/jquery.toaster.js') }}" type="text/javascript"></script> -->
</head>

<body>
    @yield('content')

    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ url( backEndJsPath.'/popper2.min.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/bootstrap.min.js') }}"></script>
    <script src="{{ url( backEndJsPath.'/toastr.min.js') }}"></script>

    @include('backEnd.common.notifications')

    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function(){
            
            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>
</body>

</html>