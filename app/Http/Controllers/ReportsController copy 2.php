<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Company;
use App\Models\Vulnerability;

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
        $vulnerabilities = Vulnerability::all();
        return view('reports.create', compact('companies', 'vulnerabilities'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'vulnerabilities' => 'nullable|array',
            'vulnerabilities.*' => 'exists:vulnerabilities,id',
            'state' => 'nullable|string|max:255',
            'date' => 'nullable|date',
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
        $report->state = $validatedData['state'];
        $report->date = $validatedData['date'];
        $report->recommendations = $validatedData['recommendations'];
        $report->proposals = $validatedData['proposals'];
        $report->conclusions = $validatedData['conclusions'];
        $report->save();

        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }
}
