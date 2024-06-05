<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vulnerability;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer la dernière vulnérabilité
        $lastVulnerability = Vulnerability::latest()->first();

        // Récupérer le nombre total de vulnérabilités enregistrées
        $totalVulnerabilities = Vulnerability::count();

        // Passer les données à la vue
        return view('dashboard', [
            'lastVulnerability' => $lastVulnerability,
            'totalVulnerabilities' => $totalVulnerabilities,
        ]);
    }
}
