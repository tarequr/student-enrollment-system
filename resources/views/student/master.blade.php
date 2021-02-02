<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Student Enrollment System</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{asset('public/admin/images/favicon.ico')}}">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset('public/admin/plugins/morris/morris.css')}}">

    <link href="{{asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/admin/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/admin/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/admin/css/style.css')}}" rel="stylesheet" type="text/css">
    @stack('css')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        
        @include('student.includes.header')

        @include('student.includes.menu')

        <div class="content-page">

            @yield('content')
            
            @include('student.includes.footer')

        </div>

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{asset('public/admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/admin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/admin/js/metismenu.min.js')}}"></script>
    <script src="{{asset('public/admin/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/admin/js/waves.min.js')}}"></script>

    <!--Morris Chart-->
    <script src="{{asset('public/admin/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/raphael/raphael.min.js')}}"></script>

    <script src="{{asset('public/admin')}}/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{asset('public/admin')}}/js/app.js"></script>
    @stack('js')
</body>

</html>