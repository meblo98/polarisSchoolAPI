<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;
use App\Models\Etudiant;
use Illuminate\Support\Facades\File;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiant = Etudiant::all();
        return $this->customJsonResponse("Liste des Étudiants", $etudiant);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEtudiantRequest $request)
    {
        $etudiant = Etudiant::create($request->validated());
        $etudiant->fill($request->validated());
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $etudiant->image = $image->store('etudiant', 'public');
        }
        $etudiant->save($request->all());
        return $this->customJsonResponse("Étudiant créé avec succès", $etudiant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return $this->customJsonResponse("Étudiant récupéré avec succès", $etudiant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtudiantRequest $request, Etudiant $etudiant)
    {
        $etudiant->fill($request->validated());
        if ($request->hasFile('image')) {

            if (File::exists(public_path("storage/" . $etudiant->image))) {
                File::delete(public_path($etudiant->image));
            }
            $image = $request->file('image');
            $etudiant->image = $image->store('etudiant', 'public');
        }

        $etudiant->update($request->all());
        return $this->customJsonResponse("Étudiant modifié avec succès", $etudiant);
    }
    public function trashed(){
        $etudiants = Etudiant::onlyTrashed()->get();
        return $this->customJsonResponse("Les étudiants archivés", $etudiants);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return $this->customJsonResponse("Étudiant supprimé avec succès", null, 200);
    }
    public function restore($id)
    {
        $etudiant = Etudiant::onlyTrashed()->where('id', $id)->first();
        $etudiant->restore();
        return $this->customJsonResponse("Étudiant restauré avec succès", $etudiant);
    }
    public function forceDelete($id)
    {
        $etudiant = Etudiant::onlyTrashed()->where('id', $id)->first();
        $etudiant->forceDelete();
        return $this->customJsonResponse("Étudiant supprimé de maniere permanant", null, 200);
    }
}
