<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $results = Report::where('name_doc', 'LIKE', "%{$query}%")
            ->orWhere('vulnerabilities', 'LIKE', "%{$query}%")
            ->orWhere('consultants', 'LIKE', "%{$query}%")
            ->orWhere('state', 'LIKE', "%{$query}%")
            ->orWhere('recommendations', 'LIKE', "%{$query}%")
            ->orWhere('proposals', 'LIKE', "%{$query}%")
            ->orWhere('conclusions', 'LIKE', "%{$query}%")
            ->paginate(12);

        return view('search.results', compact('results'));
    }
}
