<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
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
}