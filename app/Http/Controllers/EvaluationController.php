<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Log;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreEvaluationRequest $request)
    {
        $evaluation = Evaluation::create($request->validated());
        return $this->customJsonResponse("Note ajoutée avec succès", $evaluation);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        return $this->customJsonResponse("evaluation récupéré avec succès", $evaluation);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        Log::info('Update method reached');
        
        $evaluation->update($request->validated());
        return $this->customJsonResponse("Note mise à jour avec succès", $evaluation);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        return $this->customJsonResponse("Évaluation supprimé avec succès", null, 200);
    }
}
