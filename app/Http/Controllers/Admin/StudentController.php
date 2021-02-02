<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Department;
use Session;

class StudentController extends Controller
{
    public function view()
    {
    	$students    = User::orderBy('id','desc')->where('userType','student')->get();
    	return view('admin.student.view-student',compact('students'));
    }

    public function add()
    {
    	$departments = Department::all();
    	return view('admin.student.add-student',compact('departments'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name'           => 'required',
    		'father_name'    => 'required',
    		'mother_name'    => 'required',
    		'gender' 		 => 'required',
    		'religion'       => 'required',
    		'email'          => 'required|unique:users',
    		'password'       => 'required|min:6',
    		'phone'          => 'required',
    		'address'        => 'required',
    		'department'     => 'required',
    		'roll' 			 => 'required',
    		'admission_year' => 'required',
    		'image'          => 'required|mimes:jpeg,bmp,png,jpg'
    	]);

    	$student = new User();
    	$student->name           = $request->name;
    	$student->userType       = 'student';
    	$student->fName          = $request->father_name;
    	$student->mName          = $request->mother_name;
    	$student->gender         = $request->gender;
    	$student->religion       = $request->religion;
    	$student->email          = $request->email;
    	$student->password       = bcrypt($request->password);
    	$student->phone 		 = $request->phone;
    	$student->address        = $request->address;
    	$student->deptId	 	 = $request->department;
    	$student->roll 			 = $request->roll;
    	$student->admissionYear  = $request->admission_year;
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$student['image'] = $filename;
    	}
    	$student->save();

    	Session::flash('message','Student add successfully!');
    	return redirect()->route('student.view');
    }

    public function edit($id)
    {
    	$editData    = User::find($id);
    	$departments = Department::all();
    	return view('admin.student.edit-student',compact('editData','departments'));
    }

    public function update(Request $request,$id)
    {
    	$student = User::find($id);

    	$this->validate($request,[
    		'name'           => 'required',
    		'father_name'    => 'required',
    		'mother_name'    => 'required',
    		'gender' 		 => 'required',
    		'religion'       => 'required',
    		'email'          => 'required|unique:users,email,'.$student->id,
    		'phone'          => 'required',
    		'address'        => 'required',
    		'department'     => 'required',
    		'roll' 			 => 'required',
    		'admission_year' => 'required'
    	]);

    	$student->name           = $request->name;
    	$student->fName          = $request->father_name;
    	$student->mName          = $request->mother_name;
    	$student->gender         = $request->gender;
    	$student->religion       = $request->religion;
    	$student->email          = $request->email;
    	$student->phone 		 = $request->phone;
    	$student->address        = $request->address;
    	$student->deptId	 	 = $request->department;
    	$student->roll 			 = $request->roll;
    	$student->admissionYear  = $request->admission_year;
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/student_images/'.$student->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$student['image'] = $filename;
    	}
    	$student->save();

    	Session::flash('message','Student update successfully!');
    	return redirect()->route('student.view');
    }

    public function inactive($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();

        Session::flash('message','Student Inactive successfully!');
        return back();
    }

    public function active($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        Session::flash('message','Student Active successfully!');
        return back();
    }

    public function details($id)
    {
    	$details = User::find($id);
    	return view('admin.student.details-student',compact('details'));
    }

    public function delete($id)
    {
    	$student = User::find($id);

    	if (file_exists('public/upload/student_images/' . $student->image) AND ! empty($student->image)) {
    		unlink('public/upload/student_images/' . $student->image);
    	}
    	$student->delete();

    	Session::flash('message','Student delete successfully!');
    	return redirect()->route('student.view');
    }


    //another section
    public function deptWise()
    {   
        $departmentWise = Department::all();
        return view('admin.department_wise.dept_student',compact('departmentWise'));
    }

    public function deptWiseView($id)
    {
        $departmentWiseStudents = Department::where('id',$id)->first()->users;
        return view('admin.department_wise.dept_by_student_view',compact('departmentWiseStudents'));
    }

}
