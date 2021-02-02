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
        <div class="row">
        	<section class="col-md-6 offset-md-3">
        		<div class="text-center">
  			      @if(Session::get('message'))
  			        <div class="alert alert-success alert-dismissible">
  			          <button type="button" class="close" data-dismiss="alert">&times;</button>
  			          <strong>{{ Session::get('message')}}</strong>
  			        </div>
  			      @endif
  			    </div>
              <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                           src="{{(!empty($user->image))?url('public/upload/user_images/'.$user->image):url('public/upload/no-image.png')}}"
                           alt="User profile picture" style="width: 100px; height: 100px;
                           border: 3px solid #adb5bd; border-radius: 50%; padding: 3px;">
                    </div>

                    <h3 class="profile-username text-center text-dark">{{ucfirst($user->name)}}</h3>

                    <p class="text-muted text-center">{{ucfirst($user->address)}}</p>

                    <table class="table table-bordered table-striped">
                      <tr>
                        <th scope="row">Mobile No</th>
                        <td>{{$user->phone}}</td>
                      </tr>
                      <tr>
                        <th scope="row">E-Mail</th>
                        <td>{{$user->email}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Gender</th>
                        <td>{{$user->gender}}</td>
                      </tr>
                    </table>

                    <a href="{{route('student.profile.edit')}}" class="btn btn-info btn-block"><b>Edit Profile</b></a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>

    </div>
</div>
<!-- content -->
@endsection