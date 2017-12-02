<!DOCTYPE html>
<head>
    <title>App Name - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Title of the document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    {{--<link rel="stylesheet" href="/css/styles.css" type="text/css">--}}
    <link rel="stylesheet" href="/css/payment.css" type="text/css">

    <!-- Admin -->
    <link href="/css/admin/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="/css/admin/animate.min.css" rel="stylesheet"/>
    <link href="/css/admin/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/admin/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

@yield('content')
</body>
<footer>
    <script src="/js/styles.js"></script>
    <script src="/js/loginBase.js"></script>
    <script src="/js/login.js"></script>

    <!-- ADMIN -->
    <script src="/js/admin/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="/js/admin/bootstrap.min.js" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script src="/js/admin/chartist.min.js"></script>
    <!--  Notifications Plugin -->
    <script src="/js/admin/bootstrap-notify.js"></script>
    <!-- Light Bootstrap Table Core javascript -->
    <script src="/js/admin/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <!-- Light Bootstrap Table DEMO methods -->
    <script src="/js/admin/demo.js"></script>
</footer>
</html>