<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


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
        return ;

    }
}
