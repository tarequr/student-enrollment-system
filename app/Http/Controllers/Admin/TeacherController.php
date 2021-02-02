<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Department;
use App\Model\Teacher;
use Session;

class TeacherController extends Controller
{
    public function view()
    {
    	$teachers    = Teacher::orderBy('id','desc')->get();
    	return view('admin.teacher.view-teacher',compact('teachers'));
    }

    public function add()
    {
    	$departments = Department::all();
    	return view('admin.teacher.add-teacher',compact('departments'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name'           => 'required',
    		'gender' 		 => 'required',
    		'phone'          => 'required',
    		'address'        => 'required',
    		'department'     => 'required',
    		'image'          => 'required|mimes:jpeg,bmp,png,jpg'
    	]);

    	$teacher = new Teacher();
    	$teacher->name           = $request->name;
    	$teacher->gender         = $request->gender;
    	$teacher->phone 		 = $request->phone;
    	$teacher->address        = $request->address;
    	$teacher->deptId	 	 = $request->department;
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/teacher_images'),$filename);
    		$teacher['image'] = $filename;
    	}
    	$teacher->save();

    	Session::flash('message','Teacher save successfully!');
    	return redirect()->route('teacher.view');
    }

    public function edit($id)
    {
    	$editData    = Teacher::find($id);
    	$departments = Department::all();
    	return view('admin.teacher.edit-teacher',compact('editData','departments'));
    }

    public function update(Request $request,$id)
    {
    	$teacher = Teacher::find($id);

    	$this->validate($request,[
    		'name'           => 'required',
    		'gender' 		 => 'required',
    		'phone'          => 'required',
    		'address'        => 'required',
    		'department'     => 'required'
    	]);

    	$teacher->name           = $request->name;
    	$teacher->gender         = $request->gender;
    	$teacher->phone 		 = $request->phone;
    	$teacher->address        = $request->address;
    	$teacher->deptId	 	 = $request->department;
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/teacher_images/'.$teacher->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/teacher_images'),$filename);
    		$teacher['image'] = $filename;
    	}
    	$teacher->save();

    	Session::flash('message','Teacher update successfully!');
    	return redirect()->route('teacher.view');
    }

    public function inactive($id)
    {
        $user = Teacher::find($id);
        $user->status = 0;
        $user->save();

        Session::flash('message','Teacher Inactive successfully!');
        return back();
    }

    public function active($id)
    {
        $user = Teacher::find($id);
        $user->status = 1;
        $user->save();

        Session::flash('message','Teacher Active successfully!');
        return back();
    }

    public function details($id)
    {
    	$details = Teacher::find($id);
    	return view('admin.teacher.details-teacher',compact('details'));
    }

    public function delete($id)
    {
    	$teacher = Teacher::find($id);

    	if (file_exists('public/upload/teacher_images/' . $teacher->image) AND ! empty($teacher->image)) {
    		unlink('public/upload/teacher_images/' . $teacher->image);
    	}
    	$teacher->delete();

    	Session::flash('message','Teacher delete successfully!');
    	return redirect()->route('teacher.view');
    }
}
