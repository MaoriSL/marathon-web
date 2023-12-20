<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipeController extends Controller{

    public function index(){
        $equipe= [
            'nomEquipe'=>"HDMI !",
            'logo'=>"referenceDuFichier",
            'slogan'=>"HDMI",
            'localisation'=>"06E",
            'membres'=> [
                [ 'nom'=>"Sayoud--Leclercq",'prenom'=>"Maori", 'image'=>"nomFichier", 'fonctions'=>["validateur"] ],
                [ 'nom'=>"Copin",'prenom'=>"Ethan", 'image'=>"nomFichier", 'fonctions'=>["développer"] ],
                [ 'nom'=>"Vallin--Détrez",'prenom'=>"Just", 'image'=>"nomFichier", 'fonctions'=>["développer"]],
                [ 'nom'=>"Guiffroy",'prenom'=>"Romain", 'image'=>"nomFichier", 'fonctions'=>["développer"]],
                [ 'nom'=>"Allali",'prenom'=>"Yanis", 'image'=>"nomFichier", 'fonctions'=>["concépteur"]],
                [ 'nom'=>"Boisedu",'prenom'=>"Benjamin", 'image'=>"nomFichier", 'fonctions'=>["concépteur", "développer"]],
                [ 'nom'=>"Fovez",'prenom'=>"Quentin", 'image'=>"nomFichier", 'fonctions'=>["concépteur"]],
                [ 'nom'=>"Laponche",'prenom'=>"Dylan", 'image'=>"nomFichier", 'fonctions'=>["concépteur"]],
                [ 'nom'=>"Crepel",'prenom'=>"May", 'image'=>"nomFichier", 'fonctions'=>["concépteur", "développer"]],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipes' => $equipe]);
    }
}
