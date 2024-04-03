<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function index()
    {
        $competences = Competence::all();
        return view('competences.index', compact('competences'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
        ]);

        Competence::create($request->all());

        return redirect()->route('competences.index')->with('success', 'Compétence ajoutée avec succès.');
    }

    public function edit(Competence $competence)
    {
        return view('competences.edit', compact('competence'));
    }

    public function update(Request $request, Competence $competence)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
        ]);

        $competence->update($request->all());

        return redirect()->route('competences.index')->with('success', 'Compétence mise à jour avec succès.');
    }

    public function destroy(Competence $competence)
    {
        $competence->delete();

        return redirect()->route('competences.index')->with('success', 'Compétence supprimée avec succès.');
    }

    
}
