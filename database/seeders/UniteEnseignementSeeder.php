<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UniteEnseignementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unites = [
            [
                'libelle' => 'Mathématiques',
                'date_debut' => Carbon::create(2024, 9, 1),
                'date_fin' => Carbon::create(2025, 1, 15),
                'coef' => 3,
            ],
            [
                'libelle' => 'Informatique',
                'date_debut' => Carbon::create(2024, 9, 1),
                'date_fin' => Carbon::create(2025, 1, 31),
                'coef' => 4,
            ],
            [
                'libelle' => 'Physique',
                'date_debut' => Carbon::create(2024, 9, 15),
                'date_fin' => Carbon::create(2025, 1, 30),
                'coef' => 3,
            ],
            // Vous pouvez ajouter d'autres unités d'enseignement ici
        ];

        foreach ($unites as $unite) {
            DB::table('unite_enseignements')->insert([
                'libelle' => $unite['libelle'],
                'date_debut' => $unite['date_debut'],
                'date_fin' => $unite['date_fin'],
                'coef' => $unite['coef'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}