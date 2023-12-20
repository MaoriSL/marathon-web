<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;

class HistoireController extends Controller
{
    public function indexGenre($id){
        $histoires = Histoire::where('genre_id', $id)->with('user')->get();
        $genre = Genre::find($id);
        return view('histoires.indexGenre', ['histoires' => $histoires, 'genre' => $genre]);
    }
}
