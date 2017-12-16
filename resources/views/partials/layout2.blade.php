<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assetadmin/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>App Name - cc</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="/assetsadmin/css/bootstrap.min.css" type="text/css">

    <!-- Bootstrap core CSS     -->
    <link href="/assetsadmin/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="/assetsadmin/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="/assetsadmin/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/assetsadmin/css/demo.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="/assetsadmin/css/pe-icon-7-stroke.css" rel="stylesheet"/>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    {{--<script--}}
    {{--src="http://maps.googleapis.com/maps/api/js?key=YOUR_APIKEY&sensor=false">--}}
    {{--</script>--}}

    @yield('css')
</head>
<body>
<div class="wrapper">
    @include('nav.left')
    <div class="main-panel">
        @include('nav.top')
        @yield('content')
        @include('nav.bottom')
    </div>
</div>
</body>
<footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('js')
<!--   Core JS Files   -->
    <script src="/assetsadmin/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="/assetsadmin/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="/assetsadmin/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/assetsadmin/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="/assetsadmin/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="/assetsadmin/js/demo.js"></script>
</footer>
</html>