<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{

    public function index()
    {
        // Récupérer toutes les entreprises depuis la base de données
        $companies = Company::orderBy('name')->paginate(12); // Tri par ordre alphabétique du nom

        // Passer les entreprises récupérées à la vue et afficher la vue
        return view('sidebarpages.companies', ['companies' => $companies]);
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'web' => 'nullable|string|max:255',
            'mail_domain' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048', // Limite de taille de fichier en kilo-octets (2 Mo)
        ]);

        // Enregistrement de la nouvelle entreprise
        $company = new Company();
        $company->name = $validatedData['name'];
        $company->address = $validatedData['address'];
        $company->web = $validatedData['web'];
        $company->mail_domain = $validatedData['mail_domain'];

        // Traitement du fichier logo s'il est téléchargé
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $company->logo = str_replace('public/', 'storage/', $logoPath);
        }

        $company->save();

        // Redirection avec un message de succès
        return redirect()->route('company.create')->with('success', 'Company registered successfully.');
    }

    public function create()
    {
        return view('companies.create');
    }
}
