<?php

namespace App\Http\Controllers;

use App\Models\Nist; // Assurez-vous que le modèle Nist existe
use Illuminate\Http\Request;

class SidebarpagesController extends Controller
{
    public function nist()
    {
        $nist = Nist::all(); // Récupérer tous les enregistrements NIST
        return view('sidebarpages.nist', ['nist' => $nist]); // Passer les données à la vue
    }
}
