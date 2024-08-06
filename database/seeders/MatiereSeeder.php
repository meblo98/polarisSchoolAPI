<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\UniteEnseignement;

class MatiereSeeder extends Seeder
{
    public function run(): void
    {
        $uniteEnseignements = UniteEnseignement::all();

        if ($uniteEnseignements->isEmpty()) {
            throw new \Exception('Aucune Unité d\'Enseignement trouvée. Veuillez d\'abord exécuter UniteEnseignementSeeder.');
        }

        $matieres = [
            // Mathématiques
            [
                'libelle' => 'Algèbre linéaire',
                'date_debut' => Carbon::create(2024, 9, 1),
                'date_fin' => Carbon::create(2024, 12, 15),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Mathématiques')->first()->id,
            ],
            [
                'libelle' => 'Analyse réelle',
                'date_debut' => Carbon::create(2024, 9, 1),
                'date_fin' => Carbon::create(2024, 12, 31),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Mathématiques')->first()->id,
            ],
            [
                'libelle' => 'Probabilités',
                'date_debut' => Carbon::create(2024, 10, 1),
                'date_fin' => Carbon::create(2025, 1, 15),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Mathématiques')->first()->id,
            ],
            [
                'libelle' => 'Géométrie',
                'date_debut' => Carbon::create(2024, 9, 15),
                'date_fin' => Carbon::create(2024, 12, 20),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Mathématiques')->first()->id,
            ],
            
            // Informatique
            [
                'libelle' => 'Programmation orientée objet',
                'date_debut' => Carbon::create(2024, 9, 1),
                'date_fin' => Carbon::create(2025, 1, 15),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Informatique')->first()->id,
            ],
            [
                'libelle' => 'Structures de données',
                'date_debut' => Carbon::create(2024, 9, 1),
                'date_fin' => Carbon::create(2024, 12, 31),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Informatique')->first()->id,
            ],
            [
                'libelle' => 'Bases de données',
                'date_debut' => Carbon::create(2024, 10, 1),
                'date_fin' => Carbon::create(2025, 1, 31),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Informatique')->first()->id,
            ],
            [
                'libelle' => 'Réseaux informatiques',
                'date_debut' => Carbon::create(2024, 9, 15),
                'date_fin' => Carbon::create(2025, 1, 15),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Informatique')->first()->id,
            ],
            
            // Physique
            [
                'libelle' => 'Mécanique classique',
                'date_debut' => Carbon::create(2024, 9, 15),
                'date_fin' => Carbon::create(2025, 1, 15),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Physique')->first()->id,
            ],
            [
                'libelle' => 'Électromagnétisme',
                'date_debut' => Carbon::create(2024, 9, 1),
                'date_fin' => Carbon::create(2024, 12, 31),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Physique')->first()->id,
            ],
            [
                'libelle' => 'Thermodynamique',
                'date_debut' => Carbon::create(2024, 10, 1),
                'date_fin' => Carbon::create(2025, 1, 31),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Physique')->first()->id,
            ],
            [
                'libelle' => 'Optique',
                'date_debut' => Carbon::create(2024, 9, 15),
                'date_fin' => Carbon::create(2025, 1, 15),
                'unite_enseignement_id' => $uniteEnseignements->where('libelle', 'Physique')->first()->id,
            ],
        ];

        foreach ($matieres as $matiere) {
            DB::table('matieres')->insert([
                'libelle' => $matiere['libelle'],
                'date_debut' => $matiere['date_debut'],
                'date_fin' => $matiere['date_fin'],
                'unite_enseignement_id' => $matiere['unite_enseignement_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}