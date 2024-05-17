<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        // Ajoutez ici la logique de recherche, par exemple :
        // $results = Model::where('column', 'like', '%' . $query . '%')->get();

        // Pour l'instant, retournez simplement la requête de recherche
        return view('search.results', compact('query'));
    }
}
