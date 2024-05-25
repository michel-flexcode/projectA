<?php

namespace App\Http\Controllers;

use App\Models\Nist; // Assurez-vous d'importer le modèle
use Illuminate\Http\Request;

class SidebarpagesController extends Controller
{
    public function vulnerabilities()
    {
        // Retourne la vue des vulnérabilités
        return view('sidebarpages.vulnerabilities');
    }

    public function nist()
    {
        // Récupère les données depuis le modèle Nist
        $nist = Nist::all(); // Récupérer tous les enregistrements NIST
        return view('sidebarpages.nist', compact('nist')); // Passer les données à la vue
    }

    public function reports()
    {
        // Retourne la vue des vulnérabilités
        return view('sidebarpages.reports');
    }
}
