<?php

namespace App\Http\Controllers;

use App\Models\Nist;
use App\Models\Vulnerability;
use App\Models\Report;
use App\Models\Consultant;

use Illuminate\Http\Request;

class SidebarpagesController extends Controller
{
    public function vulnerabilities()
    {
        // Fetch all vulnerabilities with pagination
        $vulnerabilities = Vulnerability::paginate(12);

        // Return the view and pass the vulnerabilities data to it
        return view('sidebarpages.vulnerabilities', ['vulnerabilities' => $vulnerabilities]);
    }

    public function nist()
    {
        // Récupère les données depuis le modèle Nist
        $nist = Nist::all(); // Récupérer tous les enregistrements NIST
        return view('sidebarpages.nist', compact('nist')); // Passer les données à la vue
    }

    // Ici spécial, ne fonctionne pas comme les autres blocs : CRUD
    public function consultants()
    {
        // Fetch all consultants with pagination
        $consultants = Consultant::paginate(12); // Assurez-vous que Consultant est le bon modèle

        // Retourner la vue et passer les données des consultants
        return view('consultants.index', ['consultants' => $consultants]);
    }

    public function reports()
    {
        // Fetch all reports with pagination
        // $reports = Report::paginate(12); // Corrected from Reports to Report
        $reports = Report::with('company')->paginate(12); // Adjust the number as needed


        // Return the view and pass the reports data to it
        return view('sidebarpages.reports', ['reports' => $reports]); // Corrected variable name to $reports
    }
}
