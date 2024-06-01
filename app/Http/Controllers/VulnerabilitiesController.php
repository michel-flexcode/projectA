<?php
// 01/06/2024 velnerabilities crud
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vulnerability;

class VulnerabilityController extends Controller
{
    public function index()
    {
        $vulnerabilities = Vulnerability::all();
        return view('vulnerabilities.index', compact('vulnerabilities'));
    }

    public function create()
    {
        return view('vulnerabilities.create');
    }

    public function store(Request $request)
    {
        $vulnerability = new Vulnerability();
        $vulnerability->name = $request->name;
        $vulnerability->description = $request->description;
        $vulnerability->save();

        return redirect()->route('vulnerabilities.index');
    }

    public function show($id)
    {
        $vulnerability = Vulnerability::find($id);
        return view('vulnerabilities.show', compact('vulnerability'));
    }

    public function edit($id)
    {
        $vulnerability = Vulnerability::find($id);
        return view('vulnerabilities.edit', compact('vulnerability'));
    }

    public function update(Request $request, $id)
    {
        $vulnerability = Vulnerability::find($id);
        $vulnerability->name = $request->name;
        $vulnerability->description = $request->description;
        $vulnerability->save();

        return redirect()->route('vulnerabilities.index');
    }

    public function destroy($id)
    {
        $vulnerability = Vulnerability::find($id);
        $vulnerability->delete();

        return redirect()->route('vulnerabilities.index');
    }
}
