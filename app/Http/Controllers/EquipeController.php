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
                [ 'nom'=>"Sayoud--Leclercq",'prenom'=>"Maori", 'image'=>"Maori.svg", 'fonctions'=>["validateur"] ],
                [ 'nom'=>"Copin",'prenom'=>"Ethan", 'image'=>"Ethan.svg", 'fonctions'=>["développer"] ],
                [ 'nom'=>"Vallin--Détrez",'prenom'=>"Just", 'image'=>"Just.svg", 'fonctions'=>["développer"]],
                [ 'nom'=>"Guiffroy",'prenom'=>"Romain", 'image'=>"Romain.svg", 'fonctions'=>["développer"]],
                [ 'nom'=>"Allali",'prenom'=>"Yanis", 'image'=>"Yanis.svg", 'fonctions'=>["concépteur"]],
                [ 'nom'=>"Boisedu",'prenom'=>"Benjamin", 'image'=>"Benjamin.svg", 'fonctions'=>["concépteur", "développer"]],
                [ 'nom'=>"Fovez",'prenom'=>"Quentin", 'image'=>"Quentin.svg", 'fonctions'=>["concépteur"]],
                [ 'nom'=>"Laponche",'prenom'=>"Dylan", 'image'=>"Dylan.svg", 'fonctions'=>["concépteur"]],
                [ 'nom'=>"Crepel",'prenom'=>"May", 'image'=>"May.svg", 'fonctions'=>["concépteur", "développer"]],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipes' => $equipe]);
    }
}
