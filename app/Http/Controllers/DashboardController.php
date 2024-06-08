<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vulnerability;
use App\Models\Company;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les dernières vulnérabilités et entreprises
        $lastVulnerability = Vulnerability::latest()->first();
        $lastCompany = Company::latest()->first();

        // Compter le total des vulnérabilités et entreprises
        $totalVulnerabilities = Vulnerability::count();
        $totalCompanies = Company::count();

        // Récupérer toutes les entreprises
        $companies = Company::all();

        // Pour chaque entreprise, récupérer son dernier rapport
        $companies->each(function ($company) {
            $company->lastReport = Report::where('company_id', $company->id)
                                          ->latest()
                                          ->first();
        });

        // Passer les données à la vue
        return view('dashboard', [
            'lastVulnerability' => $lastVulnerability,
            'totalVulnerabilities' => $totalVulnerabilities,
            'lastCompany' => $lastCompany,
            'totalCompanies' => $totalCompanies,
            'companies' => $companies,
        ]);
    }
}

