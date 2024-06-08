<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Company;
use App\Models\Vulnerability;
use App\Models\Consultant;


class ReportsController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('name_doc')->paginate(12);
        return view('report', ['reports' => $reports]);
    }

    public function create()
    {
        $companies = Company::all();
        $consultants = Consultant::all();
        $vulnerabilities = Vulnerability::all();
        return view('reports.create', compact('consultants', 'companies', 'vulnerabilities'));
    }

    public function edit($id)
{
    $report = Report::findOrFail($id);

    // Récupérer les ID des vulnérabilités et des consultants
    $selectedVulnerabilities = explode(',', $report->vulnerabilities);
    $selectedConsultants = explode(',', $report->consultants);

    // Récupérer les noms des vulnérabilités et des consultants correspondants
    $vulnerabilitiesNames = Vulnerability::whereIn('id', $selectedVulnerabilities)->pluck('name')->toArray();
    $consultantsNames = Consultant::whereIn('id', $selectedConsultants)->pluck('name')->toArray();

    // Récupérer toutes les vulnérabilités et tous les consultants
    $vulnerabilities = Vulnerability::all();
    $consultants = Consultant::all();

    return view('reports.edit', compact(
        'report', 
        'vulnerabilitiesNames', 
        'consultantsNames', 
        'vulnerabilities', 
        'consultants', 
        'selectedVulnerabilities', 
        'selectedConsultants'
    ));
}


    public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'name_doc' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'recommendations' => 'nullable|string',
        'proposals' => 'nullable|string',
        'conclusions' => 'nullable|string',
        'vulnerabilities' => 'nullable|array',
        'vulnerabilities.*' => 'exists:vulnerabilities,id',
        'consultants' => 'nullable|array', 
        'consultants.*' => 'exists:consultants,id', 
        // Ajoutez les règles de validation pour les autres champs si nécessaire
    ]);

    // Trouver le rapport à mettre à jour
    $report = Report::findOrFail($id);

    // Mettre à jour les attributs du rapport avec les données validées
    $report->name_doc = $validatedData['name_doc'];
    $report->state = $validatedData['state'];
    $report->recommendations = $validatedData['recommendations'];
    $report->proposals = $validatedData['proposals'];
    $report->conclusions = $validatedData['conclusions'];

    // Mettre à jour les vulnérabilités
    $report->vulnerabilities = implode(',', $validatedData['vulnerabilities'] ?? []);

    // Mettre à jour les consultants
    $report->consultants = implode(',', $validatedData['consultants'] ?? []);

    // Enregistrez les modifications apportées au rapport
    $report->save();

    // Rediriger l'utilisateur vers une autre page ou retourner une réponse JSON, selon vos besoins
    return redirect()->route('reports.edit', $report->id)->with('success', 'Report updated successfully');
}

    
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('sidebarpages.reports')->with('success', 'Report deleted successfully.');
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'company_id' => 'required|exists:companies,id',
        'vulnerabilities' => 'nullable|array',
        'vulnerabilities.*' => 'exists:vulnerabilities,id',
        'consultants' => 'nullable|array', 
        'consultants.*' => 'exists:consultants,id', 
        'state' => 'nullable|string|max:255',
        'recommendations' => 'nullable|string',
        'proposals' => 'nullable|string',
        'conclusions' => 'nullable|string',
    ]);


    $company = Company::find($validatedData['company_id']);
    $reportName = $company->name . '_' . now()->format('Ymd_His');

    $report = new Report();
    $report->name_doc = $reportName;
    $report->company_id = $validatedData['company_id'];
    $report->vulnerabilities = implode(',', $validatedData['vulnerabilities'] ?? []);
    $report->consultants = implode(',', $validatedData['consultants'] ?? []);
    $report->state = $validatedData['state'];
    $report->date = now();
    $report->recommendations = $validatedData['recommendations'];
    $report->proposals = $validatedData['proposals'];
    $report->conclusions = $validatedData['conclusions'];
    $report->save();

    return redirect()->route('reports.create')->with('success', 'Report created successfully.');
    }

}
