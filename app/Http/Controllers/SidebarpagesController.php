<?php

namespace App\Http\Controllers;

use App\Models\Nist; // Assurez-vous d'importer le modèle
use App\Models\Vulnerability;
use App\Models\Report;

use Illuminate\Http\Request;

class SidebarpagesController extends Controller
{
    public function vulnerabilities()
    {
        // Fetch all vulnerabilities with pagination
        $vulnerabilities = Vulnerability::paginate(10);

        // Return the view and pass the vulnerabilities data to it
        return view('sidebarpages.vulnerabilities', ['vulnerabilities' => $vulnerabilities]);
    }

    public function nist()
    {
        // Récupère les données depuis le modèle Nist
        $nist = Nist::all(); // Récupérer tous les enregistrements NIST
        return view('sidebarpages.nist', compact('nist')); // Passer les données à la vue
    }

    public function reports()
    {
        // Fetch all reports with pagination
        $reports = Report::paginate(10); // Corrected from Reports to Report

        // Return the view and pass the reports data to it
        return view('sidebarpages.reports', ['reports' => $reports]); // Corrected variable name to $reports
    }
}
