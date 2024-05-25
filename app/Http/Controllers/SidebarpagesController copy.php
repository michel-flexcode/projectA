<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SidebarpagesController extends Controller
{
    public function vulnerabilities()
    {
        // Retourne la vue des vulnérabilités
        return view('sidebarpages.vulnerabilities');
    }

    public function nist()
    {
        // Retourne la vue des vulnérabilités
        return view('sidebarpages.nist');
    }

    public function reports()
    {
        // Retourne la vue des vulnérabilités
        return view('sidebarpages.reports');
    }
}
