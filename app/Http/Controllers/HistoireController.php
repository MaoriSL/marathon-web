<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class HistoireController extends Controller
{
    public function indexGenre($id){
        $histoires = Histoire::where('genre_id', $id)->with('user')->get();
        $genre = Genre::find($id);
        return view('histoires.indexGenre', ['histoires' => $histoires, 'genre' => $genre]);
    }

    public function randomStories(){
        $genres = Genre::all();
        $histoires = Histoire::inRandomOrder()->limit(5)->get();
        return view('welcome', ['histoires' => $histoires, 'genres' => $genres]);
    }
    public function addFavoris($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->favorites()->attach($id);
        } else {
            $favorites = json_decode(Cookie::get('favorites', '[]'), true);
            if (!in_array($id, $favorites)) {
                $favorites[] = $id;
            }
            Cookie::queue('favorites', json_encode($favorites), 60 * 24 * 30); // Expire après 30 jours
        }

        return back();
    }

    public function removeFavoris($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->favorites()->detach($id);
        } else {
            $favorites = json_decode(Cookie::get('favorites', '[]'), true);
            if (($key = array_search($id, $favorites)) !== false) {
                unset($favorites[$key]);
            }
            Cookie::queue('favorites', json_encode($favorites), 60 * 24 * 30); // Expire après 30 jours
        }

        return back();
    }

    public function show(Histoire $histoire)
    {
        $histoireDetails = $histoire->load('chapitres', 'avis', 'terminees', 'user', 'genre');

        if (Auth::check()) {
            $isFavorite = Auth::user()->favorites()->where('histoire_id', $histoire->id)->exists();
        } else {
            $isFavorite = in_array($histoire->id, json_decode(Cookie::get('favorites', '[]'), true));
        }

        return view('histoires.show', ['histoire' => $histoireDetails, 'isFavorite' => $isFavorite]);
    }
}