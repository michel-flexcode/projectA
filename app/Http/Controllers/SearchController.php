<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Vulnerability;
use App\Models\Consultant;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $searchTerms = explode(' ', $query);

        // Recherche par nom de rapport
        $results = Report::where('name_doc', 'LIKE', "%{$query}%");

        // Recherche par nom de vulnérabilité
        $vulnerabilities = Vulnerability::whereIn('name', $searchTerms)->pluck('id');
        $results->orWhere(function ($query) use ($vulnerabilities) {
            $query->whereIn('vulnerabilities', $vulnerabilities);
        });

        // Recherche par nom de consultant
        $consultants = Consultant::whereIn('name', $searchTerms)->pluck('id');
        $results->orWhere(function ($query) use ($consultants) {
            $query->whereIn('consultants', $consultants);
        });

        // Recherche par les autres champs
        foreach ($searchTerms as $term) {
            $results->orWhere('state', 'LIKE', "%{$term}%")
                ->orWhere('recommendations', 'LIKE', "%{$term}%")
                ->orWhere('proposals', 'LIKE', "%{$term}%")
                ->orWhere('conclusions', 'LIKE', "%{$term}%");
        }

        // Paginer les résultats
        $results = $results->paginate(12);

        return view('search.results', compact('results'));
    }
}
