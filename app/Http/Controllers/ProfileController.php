<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;
use Flash;
use Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $userId = Auth::user()->id;
        $user = User::where('id',$userId)->first();

        return view('users.profile',compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:40',
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:1500',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);
            
        $userId = Auth::user()->id;

        $userData = User::where(['id' => $userId])->first();

        if (!Hash::check($request->password, $userData->password) ) {
            Flash::error('Password yang anda masukan salah');
            return redirect()->back();
        }

        if($request->username != $userData->username)
        {
            $findUsername = User::where(['username' => $request->username])->count();
            if($findUsername != 0)
            {
                Flash::error('Username sudah digunakan');
                return redirect()->back();
            }
        }

        if($request->email != $userData->email)
        {
            $findEmail = User::where(['email' => $request->email])->count();
            if ($findEmail != 0) {
                Flash::error('Email sudah digunakan');
                return redirect()->back();
            }
        }

        $update = [
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'name' => $request->name,
        ];

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('avatar', $userId. '.' . $ext);
            $update['image'] = $path;
        }

        User::where('id',$userId)->update($update);

        Flash::success('Profile berhasil diupdate.');

        return redirect(route('profile.edit'));
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $userId = Auth::user()->id;
        $userData = User::where(['id' => $userId])->first();

        if (!Hash::check($request->oldpassword, $userData->password)) {
            Flash::error('Password lama yang anda masukan salah');
            return redirect()->back();
        }  
        $password = [
            'password' => Hash::make($request->password)
        ];

        User::where('id', $userId)->update($password);

        Flash::success('Password berhasil diubah.');

        return redirect(route('profile.edit'));
    }
}
