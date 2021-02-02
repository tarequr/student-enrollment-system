<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class ProfileController extends Controller
{
    public function view()
    {
    	$user = User::find(Auth::user()->id);
    	return view('admin.user.view-profile',compact('user'));
    }

    public function edit()
    {
    	$editProfile = User::find(Auth::user()->id);
    	return view('admin.user.edit-profile',compact('editProfile'));
    }

    public function update(Request $request)
    {
    	$profileData = User::find(Auth::user()->id);
    	$this->validate($request,[
    		'name'  => 'required',
    		'email' => 'required|unique:users,email,'.$profileData->id
    	]);
    	$profileData->name 		= $request->name;
    	$profileData->email 	= $request->email;
    	$profileData->phone 	= $request->phone;
    	$profileData->address 	= $request->address;
    	$profileData->gender 	= $request->gender;

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/user_images/'.$profileData->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$profileData['image'] = $filename;
    	}

    	$profileData->save();

    	Session::flash('message','Profile Update Successfully!');
    	return redirect()->route('profile.view');
    }

    public function passwordView()
    {
    	return view('admin.user.edit-password');
    }

    public function passwordUpdate(Request $request)
    {
    	$this->validate($request,[
    		'currentPassword' => 'required',
    		'newPassword'     => 'required|min:6',
    		'confirmPassword' => 'required_with:newPassword|same:newPassword|min:6'
    	]);

    	if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->currentPassword]) ) {
    		
    		$user = User::find(Auth::user()->id);
    		$user->password = bcrypt($request->newPassword);
    		$user->save();

    		Session::flash('message','Password Change Successfully');
    		return redirect()->route('profile.view');

    	}else{
    		Session::flash('error','Sorry! your current password dost not match');
    		return redirect()->back();
    	}
    }
}
