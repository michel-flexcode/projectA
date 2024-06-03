<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;

class ConsultantsController extends Controller
{
    public function consultants()
    {
        $consultants = Consultant::all();
        return view('sidebarpages.consultants', compact('consultants'));
    }
}
