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
}
