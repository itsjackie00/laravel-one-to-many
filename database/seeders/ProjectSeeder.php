<?php

namespace Database\Seeders;

// database/seeders/ProjectSeeder.php
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'title' => 'Progetto 1',
            'description' => 'Descrizione del progetto 1',
        ]);

        Project::create([
            'title' => 'Progetto 2',
            'description' => 'Descrizione del progetto 2',
        ]);

        // Aggiungi altri progetti se necessario
    }
}

