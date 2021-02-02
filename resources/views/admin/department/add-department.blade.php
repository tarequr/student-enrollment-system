@extends('admin.master')


@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
      <div class="page-title-box">
          <div class="row align-items-center">
            <div class="col-sm-6">
              <h4 class="mt-0 header-title mb-4">Add Department</h4>
            </div>
            <div class="col-sm-6">
              <a href="{{route('department.view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Department</a>
            </div>
          </div>
          <!-- end row -->
      </div>
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="card">
            <div class="row card-body justify-content-center">
              <h3></h3>
              <div class="col-md-11 mb-5 mt-2">
                <form class="user" method="POST" action="{{ route('department.store') }}" >
                   @csrf
                 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Department Name</label>
                    <div class="col-sm-9">
                       <input type="text" name="name" class="form-control" placeholder="Enter department name">
                       <strong class="text-danger"> {{$errors->has('name') ? $errors->first('name') : '' }} </strong>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                      <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Add Department">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- content -->
@endsection

@push('js')

@endpush