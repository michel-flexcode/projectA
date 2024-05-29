<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class SearchController extends Controller
{
    //     public function index(Request $request)
    //     {
    //         $query = $request->input('query');
    //         // Ajoutez ici la logique de recherche, par exemple :
    //         // $results = Model::where('column', 'like', '%' . $query . '%')->get();

    //         // Pour l'instant, retournez simplement la requête de recherche
    //         return view('search.results', compact('query'));
    //     }


    // public function index(Request $request)
    // {
    //     $query = $request->input('query');
    //     $results = Report::where('name_doc', 'LIKE', '%' . $query . '%')->get();

    //     return view('search.results', compact('results'));
    // }

    public function index(Request $request)
    {
        $query = $request->input('query');
        $results = Report::where('name_doc', 'LIKE', "%{$query}%")
            ->orWhere('vulnerabilities', 'LIKE', "%{$query}%")
            ->orWhere('state', 'LIKE', "%{$query}%")
            ->orWhere('recommendations', 'LIKE', "%{$query}%")
            ->orWhere('proposals', 'LIKE', "%{$query}%")
            ->orWhere('conclusions', 'LIKE', "%{$query}%")
            ->paginate(10);

        return view('search.results', compact('results'));
    }
}
