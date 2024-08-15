<?php

namespace Database\Seeders;

use App\Models\Enfermera;
use Illuminate\Database\Seeder;

class EnfermeraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enfermera::create([
            'nombreEnfermera' => 'Luisana Salas'
        ]);

        Enfermera::create([
            'nombreEnfermera' => 'Hermayonick Catalina'
        ]);
    }
}
