<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
     
        // Créer un administrateur
        User::factory()->admin()->create([
            'name' => 'meblo barham',
            'email' => 'meblo@gmail.com',
        ]);

    }
}