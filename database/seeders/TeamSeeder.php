<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            'Esteghlal',
            'Perspolis',
            'Golgohar',
            'Aluminyom',
            'Oman',
            'Omid',
        ];
        foreach ($teams as $name) {
            Team::firstOrCreate([
                'name' => $name
            ]);
        }
    }
}
