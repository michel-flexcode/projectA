<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;

class ConsultantsController extends Controller
{
    // public function consultants()
    // {
    //     $consultants = Consultant::all();
    //     return view('sidebarpages.consultants', compact('consultants'));
    // }

    // public function consultants(Request $request)
    // {
    //     // Récupérer le terme de recherche de l'URL
    //     $query = $request->input('query');

    //     // Fetch all consultants with pagination
    //     $consultants = Consultant::when($query, function ($queryBuilder) use ($query) {
    //         $queryBuilder->where('name', 'LIKE', "%{$query}%")
    //             ->orWhere('company', 'LIKE', "%{$query}%"); // Ajoutez d'autres champs au besoin
    //     })->paginate(12);

    //     // Retourner la vue et passer les données des consultants et le terme de recherche
    //     return view('consultants.index', ['consultants' => $consultants, 'query' => $query]);
    // }

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
        return view('consultants.index', ['consultants' => $consultants, 'query' => $query]);
    }
}
