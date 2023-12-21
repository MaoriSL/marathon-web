<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Parsedown;
use function Laravel\Prompts\table;

class ChapitreController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function show(Chapitre $chapitre)
    {
        $parsedown = new Parsedown();
        $chapitre->texte_html = $parsedown->text($chapitre->texte);
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
        $chapitre->premier = $request->has('active') ? 1 : 0;
        if($request->hasFile('media')){
            $media = $request->file('media');
            $path = $media->store('images', 'public');
            $chapitre->media = $path;
        }
        $chapitre->save();


        return back()->with('success', 'Chapitre créé avec succès');
        $parsedown = new Parsedown();
        $chapitre->texte_html = $parsedown->text($request->input('texte'));

        $chapitre->save();

        return back()->with('success', 'Chapitre créé avec succès');


    }

    public function link(Request $request){
        $request->validate([
            'chapitre_source_id' => 'required|exists:chapitres,id',
            'chapitre_destination_id' => 'required|exists:chapitres,id',
            'reponse' => 'required',
        ]);
        DB::table('suites')->insert([
            'chapitre_source_id' => $request->chapitre_source_id,
            'chapitre_destination_id' => $request->chapitre_destination_id,
            'reponse' => $request->reponse,

        ]);
        // Redirection vers la page précédente avec un message de succès
        return back();
    }
}