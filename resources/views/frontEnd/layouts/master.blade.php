<!DOCTYPE html>
<html lang="en">

<head>
    <title>Syncboat | @yield('title')</title>
    <meta content="@yield('description')" name="description">
    <meta content="@yield('keywords')" name="keywords">
    <link href="{{asset('frontEnd/img/icon.ico')}}" rel="icon">
    <link href="{{asset('frontEnd/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{asset('frontEnd/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/jquery.datetimepicker.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @include('frontEnd.common.header')
    <div>
        @yield('content')
    </div>
    @include('frontEnd.common.footer')



    <script src="{{asset('frontEnd/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontEnd/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontEnd/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('frontEnd/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('frontEnd/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontEnd/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontEnd/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('frontEnd/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontEnd/vendor/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('frontEnd/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('frontEnd/js/main.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.datetimepicker.full.min.js')}}"></script>
    <script type="text/javascript">
        jQuery('#datetimepicker').datetimepicker();
    </script>
</body>

</html>