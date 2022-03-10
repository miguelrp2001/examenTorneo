<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NivelTorneo;

class NivelTorneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NivelTorneo::create([
            'nombre'  =>  'Inicial'
        ]);
        NivelTorneo::create([
            'nombre'  =>  'Avanzado'
        ]);
        NivelTorneo::create([
            'nombre'  =>  'Experto'
        ]);
    }
}
