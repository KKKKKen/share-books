<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Role;

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
        $roles = Role::all();
        return view('profile.edit', compact('user', 'roles'));
    }

    
    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);

        // $inputs = $request->validate([
        //     'name' => 'required|max:225',
        //     'email' => ['required', 'email', 'max:225', Rule::unique('users')->ignore($user->id)],
        //     'avatar' => 'image|max:1024',
        //     'password' => 'required|confirmed|max:225',
        //     'password_confirmation' => 'required|same:password',
        // ]);

        $inputs = request()->validate([
            'name' => 'required|max:225',
            'email' => ['required', 'email', 'max:225', Rule::unique('users')->ignore($user->id)],
            'avatar' => 'image|max:1024',
            'password' => 'required|confirmed|max:225',
            'password_confirmation' => 'required|same:password',
        ]);

// ↓実験

// dd(request('avatar'));
        if(request('avatar'))
        {
            $oldAvatar = 'public/avatar/'.$user->avatar;
           if($oldAvatar !== 'public/avatar/user_default.jpg'){
            Storage::delete($oldAvatar);
           }
            
            // ファイルを削除してpublicとモデルに保存する
            $avatar_name = request()->file('avatar')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$avatar_name;
            // publicのstoreに保存
            request('avatar')->storeAs('public/avatar', $name);

            // モデルに保存
            $inputs['avatar'] = $name;
        }
        $inputs['password'] = Hash::make($inputs['password']);
        $user->update($inputs);

        return back()->with('message', '更新しました');

// ↑実験

        // dd($inputs);
        //  アバターを代入
        // if($inputs('avatar') )

        // if(request('avatar'))
        // {
        //     if(request('avatar')){
        //         $oldAvatar = 'public/avatar/'.$user->avatar;
        //         Storage::delete($oldAvatar);
        //     }
        //     $name = request()->file('avatar')->getClientOriginalName();
        //     $avatar = date('Ymd_His').'_'.$name;
        //     request()->file('avatar')->storeAs('public/avatar', $avatar);
        //     $inputs['avatar'] = $avatar;
        // }

        // $inputs['password'] = Hash::make($inputs['password']);
        // $user->update($inputs);

        // return back()->with('message', '情報を更新しました');
    
        // updateの閉じタグ↓
    }
    public function destroy(User $user, Request $request)
    {
        $user->roles()->detach();
        if($user->avatar !== 'user_default.jpg'){
            Storage::delete('public/avatar/.$user->avatar');
        }
        
        $user->delete();
        return back()->with('message', 'ユーザーを削除しました');

    }
}
