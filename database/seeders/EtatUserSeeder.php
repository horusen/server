<?php

namespace Database\Seeders;

use App\Models\EtatUser;
use Illuminate\Database\Seeder;

class EtatUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EtatUser::create([
            'libelle' => 'En attente de validation'
        ]);

        EtatUser::create([
            'libelle' => 'Active'
        ]);


        EtatUser::create([
            'libelle' => 'Inactive'
        ]);
    }
}
