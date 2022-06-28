<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actegories = [
            'goal',
            'pass',
            'shot',
            'skill',
        ];
        foreach ($actegories as $name) {
            Category::firstOrCreate([
                'name' => $name
            ]);
        }
    }
}
