<?php

namespace App\Http\Controllers;

use App\Models\Histoire;

class HistoireController
{
    public function show(Histoire $histoire)
    {
        $histoireDetails = $histoire->load('chapitres', 'avis', 'terminees', 'user', 'genre');

        return view('histoire.show', ['histoire' => $histoireDetails]);
    }
}

