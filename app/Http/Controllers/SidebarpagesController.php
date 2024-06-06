<?php

namespace App\Http\Controllers;

use App\Models\Vulnerability;
use App\Models\Report;
use App\Models\Consultant;

use Illuminate\Http\Request;

class SidebarpagesController extends Controller
{
    public function vulnerabilities()
    {
        $vulnerabilities = Vulnerability::paginate(12);
        return view('sidebarpages.vulnerabilities', ['vulnerabilities' => $vulnerabilities]);
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
}
