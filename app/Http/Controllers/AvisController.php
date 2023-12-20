<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
use App\Models\Histoire;
use Illuminate\Support\Facades\Auth;


class AvisController extends Controller
{
    public function store(
        Request $request,
        Histoire $histoire
    ) {
        $request->validate([
            'contenu' => 'required|string',
        ]);

        $avis = new Avis();
        $avis->contenu = $request->input('avis');
        $avis->user_id = Auth::id();
        $avis->histoire_id = $histoire->id;
        $avis->created_at = now();
        $avis->save();
        return redirect()->route('histoires.show', $histoire->id);
    }

    public function update(
        Request $request,
        Avis $avis
    ) {
        $request->validate([
            'contenu' => 'required|string',
        ]);

        $avis->contenu = $request->input('avis');
        $avis->updated_at = now();
        $avis->save();
        return redirect()->route('histoires.show', $avis->histoire->id);
    }
}
