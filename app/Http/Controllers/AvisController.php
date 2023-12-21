<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Support\Facades\Auth;

class AvisController
{
    public function destroyComment(Avis $avis)
    {
        if (Auth::id() !== $avis->user_id) {
            return redirect()->back()->with('error', "Vous n'êtes pas autorisé à supprimer ce commentaire.");
        }

        $avis->delete();

        return redirect()->back()->with('success', 'Commentaire supprimé avec succès');
    }
}