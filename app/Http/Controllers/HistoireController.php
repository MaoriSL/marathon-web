<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Support\Facades\Auth;

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
    public function show(Histoire $histoire)
    {
        $histoireDetails = $histoire->load('chapitres', 'avis', 'terminees', 'user', 'genre');

        if (Auth::check()) {
            $isFavorite = Auth::user()->favorites()->where('histoire_id', $histoire->id)->exists();
        } else {
            $isFavorite = in_array($histoire->id, session()->get('favorites', []));
        }

        return view('histoires.show', ['histoire' => $histoireDetails, 'isFavorite' => $isFavorite]);
    }

    public function addFavoris($id)
    {
        if (Auth::check()) {
            Auth::user()->favorites()->attach($id);
        } else {
            $favorites = session()->get('favorites', []);
            $favorites[] = $id;
            session()->put('favorites', $favorites);
        }

        return back();
    }

    public function removeFavoris($id)
    {
        if (Auth::check()) {
            Auth::user()->favorites()->detach($id);
        } else {
            $favorites = session()->get('favorites', []);
            if (($key = array_search($id, $favorites)) !== false) {
                unset($favorites[$key]);
            }
            session()->put('favorites', $favorites);
        }

        return back();
    }
}

