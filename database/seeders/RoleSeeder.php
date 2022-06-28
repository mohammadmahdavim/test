<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = \Spatie\Permission\Models\Permission::all();
        $superpermissions = [];
        foreach ($permissions as $permission) {
            $superpermissions[] = $permission->name;
        }
        $lists = [
            0 => [
                'name' => 'super-admin',
                'label' => 'یزنامه نویس',
                'permissions' => $superpermissions
            ],
            1 => [
                'name' => 'admin',
                'label' => 'مدیر',
                'permissions' => [
                    'user-list',
                    'user-create',
                    'user-edit',
                    'user-delete',
                    'match-list',
                    'match-create',
                    'match-edit',
                    'match-delete',
                    'event-list',
                    'event-create',
                    'event-edit',
                    'event-delete',
                ]
            ],
            2 => [
                'name' => 'operator',
                'label' => 'اپراتور',
                'permissions' => [
                    'match-list',
                    'match-create',
                    'match-edit',
                    'match-delete',
                    'event-list',
                    'event-create',
                    'event-edit',
                    'event-delete',
                ]
            ],

        ];
        foreach ($lists as $item) {
            $role = \Spatie\Permission\Models\Role::where('name', $item['name'])->first();
            if (!$role) {
                $role = \Spatie\Permission\Models\Role::create([
                    'name' => $item['name'],
                ]);
            }
            $ids = [];
            foreach ($item['permissions'] as $permission) {
                $secret = \Spatie\Permission\Models\Permission::where('name', $permission)->pluck('id')->first();
                if ($secret) {
                    $ids[] = $secret;
                }
            }
            $role->syncPermissions($ids);
        }
    }
}
