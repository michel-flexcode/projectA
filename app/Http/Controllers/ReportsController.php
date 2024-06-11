<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

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

    $selectedVulnerabilities = explode(',', $report->vulnerabilities);
    $selectedConsultants = explode(',', $report->consultants);

    $vulnerabilitiesNames = Vulnerability::whereIn('id', $selectedVulnerabilities)->pluck('name', 'id')->toArray();
    $consultantsNames = Consultant::whereIn('id', $selectedConsultants)->pluck('name', 'id')->toArray();

    $companies = Company::all();
    $vulnerabilities = Vulnerability::all();
    $consultants = Consultant::all();

    return view('reports.edit', compact(
        'report', 
        'companies',
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
    ]);

    $report = Report::findOrFail($id);

    $report->name_doc = $validatedData['name_doc'];
    $report->state = $validatedData['state'];
    $report->recommendations = $validatedData['recommendations'];
    $report->proposals = $validatedData['proposals'];
    $report->conclusions = $validatedData['conclusions'];

    $report->vulnerabilities = implode(',', $validatedData['vulnerabilities'] ?? []);

    $report->consultants = implode(',', $validatedData['consultants'] ?? []);

    $report->save();

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

    public function show($id)
    {
        $report = Report::findOrFail($id);

        return view('reports.show', compact('report'));
    }

// public function generatePDF($id)
// {
//     $report = Report::findOrFail($id);

//     // Récupérer le contenu HTML de la vue PDF
//     $pdfView = view('reports.printpdf', compact('report'))->render();

//     // Configuration de Dompdf
//     $options = new Options();
//     $options->set('isHtml5ParserEnabled', true);
//     $options->set('isRemoteEnabled', true);

//     // Initialiser Dompdf
//     $dompdf = new Dompdf($options);

//     // Charger le contenu HTML dans Dompdf
//     $dompdf->loadHtml($pdfView);

//     // Rendre le PDF
//     $dompdf->render();

//     // Envoyer le PDF en réponse
//     return $dompdf->stream("report_{$id}.pdf");
// }

public function generatePdf($id)
{
    $report = Report::findOrFail($id);

    // Créez une vue pour le PDF
    $view = view('reports.printpdf', compact('report'))->render();

    // Configure Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($view);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Téléchargement du PDF
    return $dompdf->stream("report_{$id}.pdf");

}
};
