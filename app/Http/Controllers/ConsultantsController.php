<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;

class ConsultantsController extends Controller
{

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
    //Edit ne marche pas
    public function edit($id)
    {
        $consultants = Consultant::find($id);
        return view('consultants.edit', compact('consultant'));
    }

    public function create()
    {
        return view('consultants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string',
            'role' => 'nullable|string',
        ]);

        $consultant = new Consultant();
        $consultant->name = $request->name;
        $consultant->company = $request->company;
        $consultant->role = $request->role;
        $consultant->save();

        return redirect()->route('consultants.create');
        // return redirect()->route('/consultants');
    }
}
