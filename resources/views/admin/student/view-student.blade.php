@extends('admin.master')

@push('css')
<!-- DataTables -->
<link href="{{ asset('public/admin') }}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/admin') }}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('public/admin') }}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<style type="text/css">
  .color1{
    background: blue;
    padding: 3px;
    color: white;
    font-size: 10px;
    width: 50px;
  }

  .color2{
    background: #d60d30;
    padding: 3px;
    color: white;
    font-size: 10px;
    width: 50px;
  }
</style>
@endpush

@section('content')
<div class="content">
  <div class="container-fluid ">
      <div class="row">
          <div class="col-12">
              <div class="card m-b-30">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <h4 class="mt-0 header-title mb-4">Manage Student</h4>
                      </div>
                      <div class="col-sm-6">
                        <a href="{{route('student.add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus"></i> Add Student</a>
                      </div>
                    </div>
                    <div class="text-center">
                      @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>{{ Session::get('message')}}</strong>
                        </div>
                      @endif
                    </div>
                      <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($students as $key => $student)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student['department']['name'] }}</td>
                                <td>
                                  @if($student->status == 1)
                                    <span class="badge color1">Active</span>
                                  @else
                                    <span class="badge color2">Inactive</span>
                                  @endif
                                </td>
                                <td>
                                  <img src="{{(!empty($student->image))?url('public/upload/student_images/'.$student->image):url('public/upload/no-image.png')}}" style="width: 50px; height: 50px; border: 1px solid #000;">
                                </td>
                                <td>
                                  @if($student->status == 1)
                                  <a href="{{ route('student.inactive',$student->id) }}" class="btn btn-success btn-sm"><i class=" fa fa-arrow-up"></i></a>
                                  @else
                                  <a href="{{ route('student.active',$student->id) }}" class="btn btn-warning btn-sm"><i class=" fa fa-arrow-down"></i></a>
                                  @endif
                                  <a href="{{ route('student.edit',$student->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                  <a href="{{ route('student.details',$student->id)}}" class="btn btn-info btn-sm" title="Details" target="_blank"><i class="fa fa-eye"></i></a>
                                  <a href="{{ route('student.delete',$student->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
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

<!-- Required datatable js -->
  <script src="{{ asset('public/admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('public/admin') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="{{ asset('public/admin') }}/plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="{{ asset('public/admin') }}/plugins/datatables/buttons.bootstrap4.min.js"></script>
  <script src="{{ asset('public/admin') }}/plugins/datatables/jszip.min.js"></script>
  <script src="{{ asset('public/admin') }}/plugins/datatables/pdfmake.min.js"></script>
  <script src="{{ asset('public/admin') }}/plugins/datatables/vfs_fonts.js"></script>
  <script src="{{ asset('public/admin') }}/plugins/datatables/buttons.html5.min.js"></script>
  <script src="{{ asset('public/admin') }}/plugins/datatables/buttons.print.min.js"></script>
  <script src="{{ asset('public/admin') }}/plugins/datatables/buttons.colVis.min.js"></script>
  <!-- Responsive examples -->
  <script src="{{ asset('public/admin') }}/plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="{{ asset('public/admin') }}/plugins/datatables/responsive.bootstrap4.min.js"></script>

  <!-- Datatable init js -->
  <script src="{{ asset('public/admin') }}/pages/datatables.init.js"></script>  

@endpush