<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtudiantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'nom' => ['required','string','max:255'],
            // 'prenom' => ['required','string','max:255'],
            // 'email' => ['required','email','unique:etudiants','email'],
            // 'matricule' => ['required','unique:etudiants'],
            // 'date_naissance' => ['required','date'],
            // 'adresse' => ['required','string','max:255'],
            // 'telephone' => 'required','string','max:20',
            // 'genre' => ['required','in:femme,homme'],
            // 'niveau' => ['required','string','max:255'],
            // 'filiere' => ['required','string','max:255'],
            // "photo" => ["required", "mimes:jpeg,png,jpg", "max:2048"]
        ];
    }
}
