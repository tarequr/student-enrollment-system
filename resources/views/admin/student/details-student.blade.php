@extends('admin.master')

@push('css')
@endpush

@section('content')
<div class="content">
  <div class="container-fluid ">
      <div class="row justify-content-center">
          <div class="col-10">
              <div class="card m-b-30">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <h4 class="mt-0 mb-4">Details Of {{ $details->name }}</h4>
                      </div>
                      <div class="col-sm-6">
                        <a href="{{route('student.view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Student</a>
                      </div>
                    </div>
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                                <td>Student Name:</td>
                                <td>{{ $details->name }}</td>
                            </tr>
                            <tr>
                                <td>Image:</td>
                                <td>
                                  <img src="{{(!empty($details->image))?url('public/upload/student_images/'.$details->image):url('public/upload/no-image.png')}}" style="width: 80px; height: 80px; border: 1px solid #000;">
                                </td>
                            </tr>
                            <tr>
                                <td>Father's Name:</td>
                                <td>{{ $details->fName }}</td>
                            </tr>
                            <tr>
                                <td>Mother's Name:</td>
                                <td>{{ $details->mName }}</td>
                            </tr>
                            <tr>
                                <td>E-mail:</td>
                                <td>{{ $details->email }}</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>{{ $details->address }}</td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>{{ $details->phone }}</td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td>{{ $details->gender }}</td>
                            </tr>
                            <tr>
                                <td>Religion:</td>
                                <td>{{ $details->religion }}</td>
                            </tr>
                            <tr>
                                <td>Department:</td>
                                <td>{{ $details['department']['name'] }}</td>
                            </tr>
                            <tr>
                                <td>Roll:</td>
                                <td>{{ $details->roll }}</td>
                            </tr>
                            <tr>
                                <td>Admission Year:</td>
                                <td>{{ $details->admissionYear }}</td>
                            </tr>
                            
                            <tr>
                                <td>Status:</td>
                                <td>
                                  @if( $details->status == 1)
                                    <span class="bg-success p-2">Active</span>
                                  @else
                                    <span>Inactive</span>
                                  @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Created:</td>
                                @if($details->created_at)
                                <td>{{ $details->created_at->diffForHumans() }}</td>
                                @else
                                <td>No Time</td>
                                @endif
                            </tr>

                          </thead>
                      </table>
                  </div>
              </div>
          </div> <!-- end col -->
      </div> <!-- end row -->    
  </div>
  <!-- container-fluid -->
</div>
@endsection

@push('js')

@endpush