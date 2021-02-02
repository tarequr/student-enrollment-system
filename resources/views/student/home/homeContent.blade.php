@extends('student.master')

@section('content')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end page-title -->

        <div class="row">

            <div class="col-md-12">
                <div class="card bg-primary">
                    <div class="card-heading p-4">
                        <h1 class="text-light">Hey! {{ Auth::user()->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->

</div>
<!-- content -->

@endsection