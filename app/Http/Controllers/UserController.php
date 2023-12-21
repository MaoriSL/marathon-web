<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController
{
    public function profile()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->get();
        $histoires = $user->mesHistoires()->get();

        return view('user.profile', ['favorites' => $favorites, 'user' => $user, 'histoires' => $histoires]);
    }
    public function show($id)
    {
        $user = User::find($id);
        $histoires = $user->mesHistoires()->get();

        return view('user.show', ['user' => $user, 'histoires' => $histoires]);
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect('login')->with('error', 'You must be logged in to update the avatar.');
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar != null) {
                Storage::disk('public')->delete($user->avatar);
            }
            $avatar = $request->file('avatar');
            $path = $avatar->store('avatars', 'public');
            $user->avatar = $path;
            $user->save();
        }

        return back()->with('success', 'Avatar updated successfully');
    }

    public function deleteAvatar()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('login')->with('error', 'You must be logged in to delete the avatar.');
        }

        // Vérifiez si l'avatar actuel de l'utilisateur n'est pas l'avatar par défaut avant de le supprimer
        if ($user->avatar != 'default_avatar.png' && $user->avatar != null && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Définissez l'avatar sur l'avatar par défaut
        $user->avatar = 'default_avatar.png';
        $user->save();

        return back()->with('success', 'Avatar supprimé avec succès');
    }

}