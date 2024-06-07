<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vulnerability;
use App\Models\Report;
use App\Models\Consultant;

use Illuminate\Http\Request;

class SidebarpagesController extends Controller
{
    public function vulnerabilities(Request $request)
    {
        $query = $request->input('query');
        $vulnerabilities = Vulnerability::query()
            ->when($query, function ($queryBuilder, $query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('solution', 'like', '%' . $query . '%')
                    ->orWhere('level', 'like', '%' . $query . '%');
            })
            ->paginate(12);
        return view('sidebarpages.vulnerabilities', ['vulnerabilities' => $vulnerabilities, 'query' => $query]);
    }

    public function consultants(Request $request)
    {
        $query = $request->input('query');
        $consultants = Consultant::query()
            ->when($query, function ($queryBuilder, $query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('company', 'like', '%' . $query . '%')
                    ->orWhere('role', 'like', '%' . $query . '%');
            })
            ->paginate(12);
        return view('sidebarpages.consultants', ['consultants' => $consultants, 'query' => $query]);
    }

    public function reports()
    {
        $reports = Report::with('company')->paginate(12);
        return view('sidebarpages.reports', ['reports' => $reports]);
    }

    public function companies(Request $request)
    {
        $query = $request->input('query');
        $companies = Company::query()
            ->when($query, function ($queryBuilder, $query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('address', 'like', '%' . $query . '%')
                    ->orWhere('web', 'like', '%' . $query . '%')
                    ->orWhere('mail_domain', 'like', '%' . $query . '%');
            })
            ->paginate(12);
        return view('sidebarpages.companies', ['companies' => $companies, 'query' => $query]);
    }
}
