<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController
{
    public function profile()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->get();

        return view('user.profile', ['favorites' => $favorites]);
    }
    public function show($id)
    {
        $user = User::find($id);
        $histoires = $user->mesHistoires()->get();

        return view('user.show', ['user' => $user, 'histoires' => $histoires]);
    }
}