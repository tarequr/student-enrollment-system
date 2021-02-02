@extends('admin.master')


@section('content')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Change Password</h4>
                </div>
            </div>
            <!-- end row -->
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="row card-body justify-content-center">
                <div class="col-md-10 mb-5">
                  <div class="text-center p-2">
                    @if(Session::get('message'))
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ Session::get('message')}}</strong>
                      </div>
                    @endif
                    @if(Session::get('error'))
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ Session::get('error')}}</strong>
                      </div>
                    @endif
                    <h1 class="h4 text-gray-900 mb-4">Change Your Password!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('profile.password.update') }}">
                     @csrf
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Current Password</label>
                      <div class="col-sm-8">
                         <input type="password" name="currentPassword" class="form-control">
                         <strong class="text-danger"> {{$errors->has('currentPassword') ? $errors->first('currentPassword') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">New Password</label>
                      <div class="col-sm-8">
                         <input type="password" name="newPassword" class="form-control">
                         <strong class="text-danger"> {{$errors->has('newPassword') ? $errors->first('newPassword') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Confirm Password</label>
                      <div class="col-sm-8">
                         <input type="password" name="confirmPassword" class="form-control">
                         <strong class="text-danger"> {{$errors->has('confirmPassword') ? $errors->first('confirmPassword') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"></label>
                      <div class="col-sm-8">
                        <input type="submit" name="btn" class="btn btn-info btn-user btn-block" value="Update Password">
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
<!--image instant Show script-->
  <script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
  </script>
@endpush