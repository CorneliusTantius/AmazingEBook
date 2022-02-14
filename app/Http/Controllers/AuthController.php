<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function indexLogin()
    {
        if (Auth::viaRemember()) {
            return redirect()->intended('/home');
        }

        return view("pages.auth.login");
    }
    public function indexRegist()
    {
        return view("pages.auth.regist");
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'firstname' => ['required', 'max:25'],
            'middlename' => ['max:25'],
            'lastname' => ['required', 'max:25'],
            'gender' => ['required'],
            'email' => ['required', 'email', 'unique:account,email'],
            'role' => ['required'],
            'password' => [
                'required',
                'min:8',
                'required_with:confirm_password'
            ],
            'confirm_password' => ['min:8', 'same:password'],
            'image' => ['required']
        ]);
        $file = $request->file('image');
        $imageName = time() . '_img.' . $file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imagePath = 'images/' . $imageName;

        $acc = new Account();
        $acc->first_name = $data['firstname'];
        $acc->middle_name = $data['middlename'];
        $acc->last_name = $data['lastname'];
        $acc->gender_id = $data['gender'];
        $acc->role_id = $data['role'];
        $acc->email = $data['email'];
        $acc->password = bcrypt($data['password']);
        $acc->display_picture_link = $imagePath;
        $acc->save();

        request()->session()->flash('success', 'Registration successfull!');
        return redirect()->to('/login');
    }
    public function login(Request $request)
    {
        $creds = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $minutes = 120;
        if ($request->remember_me) {
            Cookie::queue('EMAIL_COOKIE', $request->email, $minutes); # time in minute(s)
            Cookie::queue('PASSWORD_COOKIE', $request->password, $minutes);
        }

        if (Auth::attempt($creds, true)) {
            if (Auth::user()->delete_flag == 1) {
                Auth::logout();
                return back()->with('loginError', 'Login Failed');
            }
            Session::put('auth_session', $creds);
            Session::put('username_session', $request->email);
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->with('loginError', 'Login Failed');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
