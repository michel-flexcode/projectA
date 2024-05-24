<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{
    /**
     * Affiche la liste des compagnies.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companies = Company::all();
        return view('sidebarpages.companies', compact('companies'));
    }
}
