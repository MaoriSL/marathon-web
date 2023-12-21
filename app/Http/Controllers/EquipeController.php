<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipeController extends Controller{

    public function index(){
        $equipe= [
            'nomEquipe'=>"HDMI !",
            'logo'=>"HDMISlogo.png",
            'slogan'=>"HDMI",
            'localisation'=>"06E",
            'membres'=> [
                [ 'nom'=>"Sayoud--Leclercq",'prenom'=>"Maori", 'image'=>"Maori.png", 'fonctions'=>["validateur"] ],
                [ 'nom'=>"Copin",'prenom'=>"Ethan", 'image'=>"Ethan.png", 'fonctions'=>["développer"] ],
                [ 'nom'=>"Vallin--Détrez",'prenom'=>"Just", 'image'=>"Just.png", 'fonctions'=>["développer"]],
                [ 'nom'=>"Guiffroy",'prenom'=>"Romain", 'image'=>"Romain.png", 'fonctions'=>["développer"]],
                [ 'nom'=>"Allali",'prenom'=>"Yanis", 'image'=>"Yanis.png", 'fonctions'=>["concépteur"]],
                [ 'nom'=>"Boisedu",'prenom'=>"Benjamin", 'image'=>"Benjamin.png", 'fonctions'=>["concépteur", "développer"]],
                [ 'nom'=>"Fovez",'prenom'=>"Quentin", 'image'=>"Quentin.png", 'fonctions'=>["concépteur"]],
                [ 'nom'=>"Laponche",'prenom'=>"Dylan", 'image'=>"Dylan.png", 'fonctions'=>["concépteur"]],
                [ 'nom'=>"Crepel",'prenom'=>"May", 'image'=>"May.png", 'fonctions'=>["concépteur", "développer"]],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipes' => $equipe]);
    }
}
