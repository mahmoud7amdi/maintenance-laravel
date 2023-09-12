<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AllUserController extends Controller
{
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function UserDashboard()
    {
        return view('index');
    }

    public function UserChangePassword()
    {
        return view('frontend.userdashboard.user_change_password');
    }

    public function UserUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        if (!Hash::check($request->old_password,Auth::user()->password)){
            return back()->with("error","Old Password Doesn't Match");
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status","Password Changed Successfully");
    }

    public function UserAccountPage()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.userdashboard.account_details',compact('userData'));
    }


    public function UserProfileUpdate(UserRequest $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo') ;
            @unlink(public_path('upload/user_images'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename ;
        }
        $data->save();
        $notification = array(
            'message' => 'User  Updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
