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

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
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
