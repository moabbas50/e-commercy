<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\password;

class Admincontroller extends Controller
{
    public function dashboard()
    {
        return view('admin.start');
    }


    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];


        if (Auth::guard('admin')->attempt($data)) {

            return redirect()->route('admin_dashboard')->with('success', 'Login successfully');
        } else {
            return redirect()->route('admin_showLoginForm')->with('error', 'invalid Email Or Password');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_showLoginForm');
    }
    public function forget_password()
    {
        return view('admin.forget-password');
    }
    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $admin_data = Admin::where('email', $request->email)->first();
        if (!$admin_data) {
            return redirect()->back()->with('error', ' Email not Found');
        }

        $remember_token = hash('sha256', time());
        $admin_data->remember_token = $remember_token;
        $admin_data->update();

        $reset_link = url('admin/rest-password/' . $remember_token . '/' . $request->email);
        $subject = "Reset Password";
        $message = "Please Click on below link to rest your password <br> <br> " . "<a href='" . $reset_link . "'> Click Here </a>";

        Mail::to($request->email)->send(new Websitemail($subject, $message));
        return redirect()->back()->with('success', 'Reset Password Link Sent on your Email');
    }

    public function rest_password($remember_token, $email)
    {
        $Admin_data = Admin::where('email', $email)->where('remember_token', $remember_token)->first();
        if (!$Admin_data) {
            return redirect()->route('admin_showLoginForm')->with('error', ' invaled email or rest link ');
        }
        return view('admin.reset-password',compact('remember_token', 'email'));
    }
    public function  rest_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_Confirmation' => 'required|same:password',
        ]);
        $Admin_data = Admin::where('email', $request->email)->where('remember_token', $request->remember_token)->first();
        $Admin_data->password = Hash::make($request->password);
        $Admin_data->remember_token="";
        $Admin_data->update();
        return redirect()->route('admin_showLoginForm')->with('success', ' Password Rest successfully ');
    }
}
