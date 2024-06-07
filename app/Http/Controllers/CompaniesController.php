<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;


class CompaniesController extends Controller
{
    public function create()
    {
        return view('companies.create');
    }

    public function index()
    {
        $companies = Company::orderBy('name')->paginate(12);
        return view('sidebarpages.companies', ['companies' => $companies]);
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'web' => 'required|string',
            'mail_domain' => 'required|string',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $company = Company::find($id);
        if ($company) {
            $company->name = $request->name;
            $company->web = $request->web;
            $company->mail_domain = $request->mail_domain;
            $company->address = $request->address;

            if ($request->hasFile('logo')) {
                // Supprimer l'ancien logo s'il existe
                if ($company->logo) {
                    Storage::delete($company->logo);
                }
                // Enregistrer le nouveau logo
                $logoPath = $request->file('logo')->store('logos');
                $company->logo = $logoPath;
            }

            $company->save();
        }

        return redirect()->route('companies.edit', $id)->with('success', 'Company updated successfully');
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            return redirect()->route('sidebarpages.companies')->with('success', 'Company deleted successfully');
        } else {
            return redirect()->route('sidebarpages.companies')->with('error', 'Company not found');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'web' => 'nullable|string|max:255',
            'mail_domain' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        // dd($validatedData);

        $company = new Company();
        $company->name = $validatedData['name'];
        $company->address = $validatedData['address'];
        $company->web = $validatedData['web'];
        $company->mail_domain = $validatedData['mail_domain'];


        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $company->logo = str_replace('public/', 'storage/', $logoPath);
            

        }

        $company->save();

        return redirect()->route('companies.create')->with('success', 'Company registered successfully.');
    }



    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show', compact('company'));
    }
}
