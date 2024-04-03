<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competence; 


class CompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
            Competence::create(['nom' => 'Agent d’entretien', 'description' => 'Description de l\'agent d\'entretien']);
            Competence::create(['nom' => 'Chauffeur', 'description' => 'Description du chauffeur']);
            Competence::create(['nom' => 'Cuisinier', 'description' => 'Description du cuisinier']);
        }

}
