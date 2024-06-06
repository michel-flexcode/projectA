<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;

class ConsultantsController extends Controller
{
    public function create()
    {
        return view('consultants.create');
    }

    public function show($id)
    {
        $consultant = Consultant::find($id);
        return view('consultants.show', compact('consultant'));
    }

    public function edit($id)
    {
        $consultant = Consultant::find($id);
        return view('consultants.edit', compact('consultant'));
    }

    public function destroy($id)
    {
        $consultant = Consultant::find($id);
        if ($consultant) {
            $consultant->delete();
            return redirect()->route('dashboard')->with('success', 'Consultant deleted successfully');
        } else {
            return redirect()->route('dashboard')->with('error', 'Consultant not found');
        }
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

        return redirect()->route('consultants.create')->with('success', 'Consultant created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string',
            'role' => 'nullable|string',
        ]);

        $consultant = Consultant::find($id);
        if ($consultant) {
            $consultant->name = $request->name;
            $consultant->company = $request->company;
            $consultant->role = $request->role;
            $consultant->save();
        }

        return redirect()->route('consultants.edit', $id)->with('success', 'Consultant updated successfully');
    }
}
