<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('profile.index', compact('users'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('profile.edit', compact('user'));
    }
    
    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);

        $inputs = $request->validate([
            'name' => 'required|max:225',
            'email' => ['required', 'email', 'max:225', Rule::unique('users')->ignore($user->id)],
            'avatar' => 'image|max:1024',
            'password' => 'required|confirmed|max:225',
            'password_confirmation' => 'required|same:password',
        ]);

        //  dd($inputs);
        //  アバターを代入
        // if($inputs['avatar'])
        if(request('avatar'))
        {
            $name = request()->file('avatar')->getClientOriginalName();
            $avatar = date('Ymd_His').'_'.$name;
            $inputs['avatar'] = $avatar;
        }

        $inputs['password'] = Hash::make($inputs['password']);
        $user->update($inputs);

        return back()->with('message', '情報を更新しました');


    }
}
