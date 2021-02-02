@extends('admin.master')

@push('css')
  <style type="text/css">
    .custom ul{
      margin: 0px;
      padding: 0px;
    }

    .custom ul li{
      float: left;
      list-style: none;
      padding: 6px;
      background: green;
      margin-left: 4px;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }

    .custom ul li a{
      color: white;
    }
  </style>
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
                        <h4 class="mt-0 mb-4">Department Wise Student</h4>
                      </div>
                    </div>
                    	<div class="custom">
                        <ul class="submenu">
                          @if(isset($departmentWise))
                            @foreach($departmentWise as $department)
                            <li><a href="{{ route('dept.wise.view',$department->id)}}">{{$department->name}}</a></li>
                            @endforeach
                          @else
                            <li><a href="#" class="text-danger">No department</a></li>
                          @endif
                        </ul> 
                      </div>
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