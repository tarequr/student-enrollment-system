@extends('student.master')


@section('content')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">My Profile</h4>
                </div>
            </div>
            <!-- end row -->
        </div>
        <div class="row justify-content-center">
          <div class="col-md-9">
            <div class="card">
              <div class="row card-body justify-content-center">
                <h3>Update Profile!</h3>
                <div class="col-md-11 mb-5 mt-2">
                  <form class="user" method="POST" action="{{ route('student.profile.update') }}" enctype="multipart/form-data">
                     @csrf
                   
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                         <input type="text" name="name" value="{{$editProfile->name}}" class="form-control">
                         <strong class="text-danger"> {{$errors->has('name') ? $errors->first('name') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                         <input type="email" name="email" value="{{$editProfile->email}}" class="form-control">
                         <strong class="text-danger"> {{$errors->has('email') ? $errors->first('email') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                         <input type="text" name="phone" value="{{$editProfile->phone}}" class="form-control">
                         <strong class="text-danger"> {{$errors->has('phone') ? $errors->first('phone') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                         <input type="text" name="address" value="{{$editProfile->address}}" class="form-control">
                         <strong class="text-danger"> {{$errors->has('address') ? $errors->first('address') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="gender" required="">
                          <option value="">~~~ Select Gender ~~~</option>
                          <option value="Male" {{($editProfile->gender=="Male") ? "selected":""}} >Male</option>
                          <option value="Female" {{($editProfile->Femaletype=="Female") ? "selected":""}} >Female</option>
                        </select>
                        <strong class="text-danger"> {{$errors->has('gender') ? $errors->first('gender') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Image</label>
                      <div class="col-sm-9">
                        <input type="file" name="image" id="image">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <img src="{{(!empty($editProfile->image))?url('public/upload/user_images/'.$editProfile->image):url('public/upload/no-image.png')}}" style="width: 120px; height: 120px; border: 1px solid #000;" id="showImage">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Update Profile Info">
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