<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Parsedown;
use PhpParser\Node\Expr\New_;
use App\Models\User;

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
        $histoires = Histoire::where('active', 1)->get();
        return view('histoires.index', ['histoires' => $histoires]);
    }

    public function randomStories()
    {
        $genres = Genre::all();
        $histoires = Histoire::inRandomOrder()->limit(7)->get();
        return view('welcome', ['histoires' => $histoires, 'genres' => $genres]);
    }

    public function show(Histoire $histoire)
    {

        $parsedown = new Parsedown();
        $histoire->pitch_html = $parsedown->text($histoire->pitch);

        $histoireDetails = $histoire->load('chapitres', 'avis', 'terminees', 'user', 'genre');

        if (Auth::check()) {
            $isFavorite = Auth::user()->favorites()->where('histoire_id', $histoire->id)->exists();
        } else {
            $isFavorite = in_array($histoire->id, json_decode(Cookie::get('favorites', '[]'), true));
        }

        return view('histoires.show', ['histoire' => $histoireDetails, 'isFavorite' => $isFavorite]);
    }

    public function addFavoris($id)
    {
        $user = Auth::user();
        $user->favorites()->attach($id);

        return back();
    }

    public function removeFavoris($id)
    {
        $user = Auth::user();
        $user->favorites()->detach($id);

        return back();
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
        $newhistoire->active = (int)$request->boolean('active');
        $newhistoire->genre_id = $request->input('genre_id');
        $newhistoire->user_id = $request->input('user_id');

        if ($request->hasFile('photo')) {
            if ($newhistoire->photo != null) {
                Storage::disk('public')->delete($newhistoire->photo);
            }
            $photo = $request->file('photo');
            $path = $photo->store('storage/images', 'public');
            $newhistoire->photo = $path;
        }
        $parsedown = new Parsedown();
        $newhistoire->pitch = $parsedown->text($request->input('pitch'));

        $newhistoire->save();

        return redirect()->route('chapitre.edit', ['id' => $newhistoire->id]);
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

    public function editChapitre($id){
        $histoire = Histoire::find($id);
        $chapitres = $histoire->chapitres;
        return view('histoires.edit', ['histoire' => $histoire, 'chapitres' => $chapitres]);
    }

    public function destroy(Histoire $histoire)
    {
        if (Auth::id() !== $histoire->user_id) {
            return redirect()->back()->with('error', "Vous n'êtes pas autorisé à supprimer cette histoire.");
        }

        $histoire->delete();

        return redirect()->route('histoires.index')->with('success', 'Histoire supprimée avec succès');
    }

    public function makePublic(Histoire $histoire)
    {
        $histoire->active = 1;
        $histoire->save();

        return redirect()->back()->with('success', 'Histoire rendue publique');
    }

    public function makePrivate(Histoire $histoire)
    {
        $histoire->active = 0;
        $histoire->save();

        return redirect()->back()->with('success', 'Histoire rendue privée');
    }

}
