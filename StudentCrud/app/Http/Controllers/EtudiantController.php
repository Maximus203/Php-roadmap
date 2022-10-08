<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::orderBy("nom", "asc")->paginate(10);
        return view('etudiant', compact("etudiants"));
    }

    public function create()
    {
        $classes = Classe::all();
        return view('createEtudiant', compact("classes"));
    }

    public function edit(Etudiant $etudiant)
    {
        $classes = Classe::all();
        return view('createEtudiant', compact("etudiant"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "classe_id" => "required"
        ]);

        // Etudiant::create($request->all());

        Etudiant::create([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "classe_id" => $request->classe_id
        ]);

        return back()->with("success", "Etudiant ajoute avec succes !");
    }

    public function delete($etudiant)
    {
        $nomComplet = $etudiant->nom . " " . $etudiant->prenom;
        Etudiant::find($etudiant)->delete();

        return back()->with("successDelete", "L'Etudiant '$nomComplet' supprimer avec succes !");
    }


    public function update(Etudiant $etudiant, Request $request)
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "classe_id" => "required"
        ]);

        // Etudiant::create($request->all());

        $etudiant->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "classe_id" => $request->classe_id
        ]);

        return back()->with("success", "Etudiant editer avec succes !");
    }
}