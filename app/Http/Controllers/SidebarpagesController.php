<?php

namespace App\Http\Controllers;

use App\Models\Vulnerability;
use App\Models\Report;
use App\Models\Consultant;

use Illuminate\Http\Request;

class SidebarpagesController extends Controller
{
    public function vulnerabilities()
    {
        // Fetch all vulnerabilities with pagination
        $vulnerabilities = Vulnerability::paginate(12);

        // Return the view and pass the vulnerabilities data to it
        return view('sidebarpages.vulnerabilities', ['vulnerabilities' => $vulnerabilities]);
    }

    // Ici spécial, ne fonctionne pas comme les autres blocs : CRUD
    public function consultants(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Fetch consultants based on the search query
        $consultants = Consultant::query()
            ->when($query, function ($queryBuilder, $query) {
                // Add conditions to filter consultants based on the search query
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('company', 'like', '%' . $query . '%')
                    ->orWhere('role', 'like', '%' . $query . '%');
            })
            ->paginate(12);

        // Return the view with the consultants and the search query
        return view('sidebarpages.consultants', ['consultants' => $consultants, 'query' => $query]);
    }

    public function reports()
    {
        $reports = Report::with('company')->paginate(12);
        return view('sidebarpages.reports', ['reports' => $reports]);
    }
}
