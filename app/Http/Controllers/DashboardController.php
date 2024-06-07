<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vulnerability;
use App\Models\Company;

class DashboardController extends Controller
{
    public function index()
    {
        $lastVulnerability = Vulnerability::latest()->first();
        $lastCompany = Company::latest()->first();

        $totalVulnerabilities = Vulnerability::count();
        $totalCompanies = Company::count();

        // Passer les données à la vue
        return view('dashboard', [
            'lastVulnerability' => $lastVulnerability,
            'totalVulnerabilities' => $totalVulnerabilities,
            'lastCompany' => $lastCompany,
            'totalCompanies' => $totalCompanies,
        ]);
    }
}
