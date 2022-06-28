<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Player::firstOrCreate([
            'first_name' => 'mohammad',
            'last_name' => 'mahdavi',
        ]);
    }

}
