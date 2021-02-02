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
</head>

<body>
    <div id="wrapper">
        <div class="content">
            <div class="container-fluid justify-content-center">
                <!-- end page-title -->
                <div class="page-title-box mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                        </div>
                    </div> <!-- end row -->
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title mb-3 text-center">Welcome Back!</h4>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>E-Mail</label>
                                        <div>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your e-mail"/>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter your password"/>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block mt-3">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <a href="" class="text-blue"><i class="fa fa-lock m-r-5"></i> Forgot password?</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->                     
            </div>
        </div>
    </div>

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
</body>

</html>