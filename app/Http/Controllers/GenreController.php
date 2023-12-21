<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('welcome', ['genres' => $genres]);
    }

    public function show($id)
    {

        $genre = Genre::find($id);

        return view('genres.show', ['genre' => $genre]);
    }
}
