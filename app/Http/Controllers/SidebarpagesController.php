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
}
