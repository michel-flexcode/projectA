<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report; // Importer le modèle Report

class ReportsController extends Controller
{

    public function index()
    {
        // Récupérer tous les rapports depuis la base de données
        $reports = Report::orderBy('name_doc')->paginate(12); // Tri par ordre alphabétique du nom

        // Passer les rapports récupérés à la vue et afficher la vue
        return view('report', ['reports' => $reports]);
    }

    public function create()
    {
        // Afficher le formulaire de création de rapport
        return view('reports.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'name_doc' => 'required|string|max:255',
            'vulnerabilities' => 'nullable|string',
            'state' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'recommendations' => 'nullable|string',
            'proposals' => 'nullable|string',
            'conclusions' => 'nullable|string',
            'company_id' => 'nullable|exists:companies,id', // Vérifier que l'ID de la société existe dans la table des entreprises
        ]);

        // Enregistrement du nouveau rapport
        $report = new Report();
        $report->name_doc = $validatedData['name_doc'];
        $report->vulnerabilities = $validatedData['vulnerabilities'];
        $report->state = $validatedData['state'];
        $report->date = $validatedData['date'];
        $report->recommendations = $validatedData['recommendations'];
        $report->proposals = $validatedData['proposals'];
        $report->conclusions = $validatedData['conclusions'];
        $report->company_id = $validatedData['company_id'];

        $report->save();

        // Redirection avec un message de succès
        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }
}
