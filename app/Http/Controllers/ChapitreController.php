<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapitreController extends Controller
{

    public function show(Chapitre $chapitre)
    {
        $user = Auth::user();

        if ($chapitre->suivants->isEmpty()) {
            $terminees = $user->terminees()->where('histoire_id', $chapitre->histoire_id)->first();

            if ($terminees) {
                $terminees->pivot->nombre += 1;
                $terminees->pivot->save();
            } else {
                $user->terminees()->attach($chapitre->histoire_id, ['nombre' => 1]);
            }
        }

        $chapitreDetails = $chapitre->load('histoire');

        return view('chapitres.show', ['chapitre' => $chapitreDetails]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'titre' => 'required|max:255',
            'titrecourt' => 'required|max:50',
            'text' => 'required',
            'histoire_id' => 'required|exists:histoires,id',
        ]);

        $chapitre = new Chapitre();
        $chapitre->titre = $request->input('titre');
        $chapitre->titrecourt = $request->input('titrecourt');
        $chapitre->texte = $request->input('text');
        $chapitre->media = 'images/logo.jpg';
        $chapitre->question = $request->input('question');
        $chapitre->histoire_id = $request->input('histoire_id');
        if(isset($request->premier) && $request->premier == 'on'){
            $chapitre->premier = 1;
        } else {
            $chapitre->premier = 0;
        }
        if($request->hasFile('media')){
            $media = $request->file('media');
            $path = $media->store('images', 'public');
            $chapitre->media = $path;
        }
        $chapitre->save();


        return back()->with('success', 'Chapitre créé avec succès');
    }

    public function link(Request $request){
        $request->validate([
            'chapitreSrc_id' => 'required|exists:chapitres,id',
            'chapitreDest_id' => 'required|exists:chapitres,id',
            'reponse' => 'required',
        ]);

        $chapitreSrc = Chapitre::find($request->input('chapitreSrc_id'));
        $chapitreDest = Chapitre::find($request->input('chapitreDest_id'));

        $chapitreSrc->suivant()->attach($chapitreDest->id, ['reponse' => $request->input('reponse')]);

        return back()->with('success', 'Chapitre lié avec succès');
    }


}