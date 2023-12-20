<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\New_;

class HistoireController extends Controller
{
    public function indexGenre($id)
    {
        $histoires = Histoire::where('genre_id', $id)->with('user')->get();
        $genre = Genre::find($id);
        return view('histoires.indexGenre', ['histoires' => $histoires, 'genre' => $genre]);
    }

    public function index()
    {
        $histoires = Histoire::all();
        return view('histoires.index', ['histoires' => $histoires]);
    }

    public function randomStories()
    {
        $genres = Genre::all();
        $histoires = Histoire::inRandomOrder()->limit(5)->get();
        return view('welcome', ['histoires' => $histoires, 'genres' => $genres]);
    }

    public function show(int $id)
    {
        $histoire = Histoire::find($id);
        return view('histoires.show', ['histoire' => $histoire]);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('histoires.create', ['genres' => $genres]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                'titre' => 'required|max:255',
                'pitch' => 'required',
                'active' => 'required',
                'genre_id' => 'required|exists:genres,id',
                'user_id' => 'required|exists:users,id',
            ]
        );

        $newhistoire = new Histoire();
        $newhistoire->titre = $request->input('titre');
        $newhistoire->pitch = $request->input('pitch');
        $newhistoire->photo = 'images/logo.jpg';
        $newhistoire->active = $request->input('active');
        $newhistoire->genre_id = $request->input('genre_id');
        $newhistoire->user_id = $request->input('user_id');

        if ($request->hasFile('photo')) {
            if ($newhistoire->photo != null) {
                Storage::disk('public')->delete($newhistoire->photo);
            }
            $photo = $request->file('photo');
            $path = $photo->store('images', 'public');
            $newhistoire->photo = $path;


        }
        $newhistoire->save();

        return redirect()->route('histoires.show', ['histoire' => $newhistoire->id]);
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = $request->input('id');
        $histoire = Histoire::find($id);

        if ($request->hasFile('photo')) {
            if ($histoire->photo != null) {
                Storage::disk('public')->delete($histoire->photo);
            }
            $photo = $request->file('photo');
            $path = $photo->store('images', 'public');
            $histoire->photo = $path;
            $histoire->save();
        }

        return redirect()->route('profile')->with('success', 'photo');
    }

    public function storeComment(Request $request){
        $request->validate([
            'contenu' => 'required',
            'histoire_id' => 'required|exists:histoires,id',
        ]);

        $histoireId = $request->input('histoire_id');

        $avis = new Avis();
        $avis->contenu = $request->input('contenu');
        $avis->user_id = Auth::id();
        $avis->histoire_id = $request->input('histoire_id');

        $avis->save();

        return back()->with('success', 'Avis ajouté avec succès');
    }


}

