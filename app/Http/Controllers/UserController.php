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
        $histoires = null;
        $favorites = null;

        if (Auth::check()) {
            $user = Auth::user();
            $histoires = $user->histoires;
            $favorites = $user->favorites()->with('histoire')->get()->pluck('histoire');
        }else{
            $favoriteIds = json_decode(Cookie::get('favorites', '[]'), true);
            foreach ($favoriteIds as $id) {
                $favorites[] = Histoire::find($id);
                if($favorites){
                    $favorites[] = $histoires;
                }
            }
        }

        return view('user.profile', ['histoires' => $histoires, 'favorites' => $favorites]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $histoires = $user->mesHistoires()->get();

        return view('user.show', ['user' => $user, 'histoires' => $histoires]);
    }
}