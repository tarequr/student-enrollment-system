<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Department;
use Session;

class DepartmentController extends Controller
{
    public function view()
    {
    	$departments = Department::orderBy('id','desc')->get();
    	return view('admin.department.view-department',compact('departments'));
    }

    public function add()
    {
    	return view('admin.department.add-department');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|unique:departments'
    	]);

    	$department = new Department();
    	$department->name = $request->name;
    	$department->save();

    	Session::flash('message','Department add successfully!');
    	return redirect()->route('department.view');
    }

    public function edit($id)
    {
    	$editData = Department::find($id);
    	return view('admin.department.edit-department',compact('editData'));
    }

    public function update(Request $request,$id)
    {
    	$department = Department::find($id);
    	$department->name = $request->name;
    	$department->save();

    	Session::flash('message','Department update successfully!');
    	return redirect()->route('department.view');
    }

    public function delete($id)
    {
    	$department = Department::find($id);
    	$department->delete();

    	Session::flash('message','Department delete successfully!');
    	return redirect()->route('department.view');
    }
}
