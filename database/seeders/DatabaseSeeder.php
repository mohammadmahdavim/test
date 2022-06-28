<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $user=\App\Models\User::firstOrCreate([
            'first_name' => 'mohammad',
            'last_name' => 'mahdavi',
            'national_code' => '1234567890',
            'password' => Hash::make('1234567890'),
        ]);
        $role=Role::where('name','super-admin')->first();
        $user->syncRoles($role);
    }
}
