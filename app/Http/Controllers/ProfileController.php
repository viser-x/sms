<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $id    = Auth::user()->id;
        $users = User::find($id);
        return view('admin.profile.profile', compact('users'));
    }

    public function editProfile()
    {
        return view('admin.profile.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        // return ($request->all());
        $request->validate([
            'name'    => 'required|max:25',
            'address' => 'max:200',
            'phone'   => 'max:15'
        ]);

        $id = Auth::user()->id;
        $users = User::findOrFail($id);
        $users->phone   = $request->input('phone');
        $users->name    = $request->input('name');
        $users->address = $request->input('address');
        $users->update();
        // $request->session()->flash('msg', 'Profile Successfully Updated');
        return redirect(route('profile'))->with('msg', 'Profile Successfully Updated');
    }

    public function changePassword()
    {
        return view('admin.profile.password');
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'current_password'     => 'required',
            'new_password'         => 'required',
            'confirm_new_password' => 'required|same:new_password',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->with("error", "Current Password Doesn't Match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        // return ($request->all());
        return redirect()->back()->with("msg", "Password Changed Successfully!");
    }
}
