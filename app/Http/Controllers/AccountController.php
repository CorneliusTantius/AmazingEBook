<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function profile()
    {
        return View('pages.user.profile', ['user' => Auth::user()]);
    }
    public function updateprofile(Request $request)
    {
        $data = $request->validate([
            'firstname' => ['required', 'max:25'],
            'middlename' => ['max:25'],
            'lastname' => ['required', 'max:25'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['min:8']
        ]);
        $acc = Account::find(Auth::user()->account_id);
        if ($data['password'] != null) {
            $acc->password = bcrypt($data['password']);
        }
        $acc->first_name = $data['firstname'];
        $acc->middle_name = $data['middlename'];
        $acc->last_name = $data['lastname'];
        $acc->gender_id = $data['gender'];

        $file = $request->file('image');
        if ($file != null) {
            $imageName = time() . '_img.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $imageName);
            $imagePath = 'images/' . $imageName;
            $acc->display_picture_link = $imagePath;
        }
        $acc->update();
        return back();
    }
    public function management()
    {
        return View('pages.admin.management', ['users' => Account::whereRaw('delete_flag != 1')->get()]);
    }
    public function deleteUser($id)
    {
        $n = Account::find($id);
        $n->delete_flag = 1;
        $n->update();
        return back();
    }
    public function changeRole($id)
    {
        $n = Account::find($id);
        $n->role_id = $n->role_id == 1 ? 2 : 1;
        $n->update();
        return back();
    }
}
