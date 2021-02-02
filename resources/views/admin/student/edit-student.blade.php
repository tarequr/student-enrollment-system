@extends('admin.master')


@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
      <div class="page-title-box">
          <div class="row align-items-center">
            <div class="col-sm-6">
              <h4 class="mt-0 header-title mb-4">Update Student</h4>
            </div>
            <div class="col-sm-6">
              <a href="{{route('student.view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Student</a>
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
                <form class="user" method="POST" action="{{ route('student.update',$editData->id) }}" enctype="multipart/form-data">
                   @csrf
                 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Student Name</label>
                    <div class="col-sm-9">
                       <input type="text" name="name" class="form-control" value="{{ $editData->name }}">
                       <strong class="text-danger"> {{$errors->has('name') ? $errors->first('name') : '' }} </strong>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Father's Name</label>
                    <div class="col-sm-9">
                       <input type="text" name="father_name" class="form-control" value="{{ $editData->fName }}">
                       <strong class="text-danger"> {{$errors->has('father_name') ? $errors->first('father_name') : '' }} </strong>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Mother's Name</label>
                    <div class="col-sm-9">
                       <input type="text" name="mother_name" class="form-control" value="{{ $editData->mName }}">
                       <strong class="text-danger"> {{$errors->has('mother_name') ? $errors->first('mother_name') : '' }} </strong>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="gender">
                        <option value="">select gender</option>
                        <option value="Male" {{($editData->gender=="Male") ? "selected":""}}>Male</option>
                        <option value="Female" {{($editData->gender=="Female") ? "selected":""}}>Female</option>
                      </select>
                       <strong class="text-danger"> {{$errors->has('gender') ? $errors->first('gender') : '' }} </strong>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Religion</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="religion">
                          <option value="">select religion</option>
                          <option value="Islam" {{($editData->religion=="Islam") ? "selected":""}}>Islam</option>
                          <option value="Hindu" {{($editData->religion=="Hindu") ? "selected":""}}>Hindu</option>
                          <option value="Khristan" {{($editData->religion=="Khristan") ? "selected":""}}>Khristan</option>
                        </select>
                       <strong class="text-danger"> {{$errors->has('religion') ? $errors->first('religion') : '' }} </strong>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                       <input type="email" name="email" class="form-control" value="{{ $editData->email }}">
                       <strong class="text-danger"> {{$errors->has('email') ? $errors->first('email') : '' }} </strong>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                       <input type="text" name="phone" class="form-control" value="{{ $editData->phone }}">
                       <strong class="text-danger"> {{$errors->has('phone') ? $errors->first('phone') : '' }} </strong>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                       <input type="text" name="address" class="form-control" value="{{ $editData->address }}">
                       <strong class="text-danger"> {{$errors->has('address') ? $errors->first('address') : '' }} </strong>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Department</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="department">
                         <option value="">select department</option>
                         @foreach($departments as $department)
                         <option value="{{$department->id}}" {{ ($editData->deptId == $department->id)? "selected" : "" }} >{{$department->name}}</option>
                         @endforeach
                       </select>
                       <strong class="text-danger"> {{$errors->has('department') ? $errors->first('department') : '' }} </strong>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Roll</label>
                    <div class="col-sm-9">
                       <input type="number" name="roll" class="form-control" value="{{ $editData->roll }}">
                       <strong class="text-danger"> {{$errors->has('roll') ? $errors->first('roll') : '' }} </strong>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Admission Year</label>
                    <div class="col-sm-9">
                       <input type="number" name="admission_year" class="form-control" value="{{ $editData->admissionYear }}">
                       <strong class="text-danger"> {{$errors->has('admission_year') ? $errors->first('admission_year') : '' }} </strong>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Image</label>
                    <div class="col-sm-9">
                      <input type="file" name="image" id="image"><br>
                      <strong class="text-danger"> {{$errors->has('image') ? $errors->first('image') : '' }} </strong>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                      <img src="{{(!empty($editData->image))?url('public/upload/student_images/'.$editData->image):url('public/upload/no-image.png')}}" style="width: 150px; height: 150px; border: 1px solid #000;" id="showImage">
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