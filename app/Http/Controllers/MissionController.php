<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Competence;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::all();
        
        return view('missions.index', compact('missions'));
    }

    public function create()
    {   
        $competences = Competence::all();
        $missions = Mission::all();

        return view('missions.create', ['competences' => $competences, 'missions' => $missions]);
    }

    public function store(Request $request)
    {
        // {{dd($request);}}
        // Validation des données
        $request->validate([
            'fullname' => 'required',
            'description' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'heure_minute' => 'required',
            'taux_horaire' => 'required|numeric',
            'lieu' => 'required',
            'competences' => 'required|array',
            'competences.*' => 'exists:competences,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Gestion de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }
    
        // Création de la mission
        $mission = new Mission([
            'fullname' => $request->get('fullname'),
            'description' => $request->get('description'),
            'date_debut' => $request->get('date_debut'),
            'date_fin' => $request->get('date_fin'),
            'heure_minute' => $request->get('heure_minute'),
            'competences' => $request->get('competences'),
            'taux_horaire' => $request->get('taux_horaire'),
            'lieu' => $request->get('lieu'),
            'image' => $imageName,
        ]);
        $mission->save();
    
        // Ajout des compétences requises
        $mission->competences()->attach($request->get('competences'));
    
        return redirect()->route('missions.index')->with('success', 'Mission créée avec succès.');
    }
    
}
