<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class ProfileController extends Controller
{
    public function index()
    {
        return view('todos.profile-settings.profile');
    }

    public function profile_update(Request $request)
    {
        User::update_information($request);
        toastr()->success('Profile Updated Successfully');
        return back();
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
        ]);

        #Match The Current Password
        if(!Hash::check($request->current_password, auth()->user()->password)){
            toastr()->warning('Current Password Doesn\'t match!');
            return back();
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        toastr()->success('Password changed successfully!');
        return back();
    }
}
