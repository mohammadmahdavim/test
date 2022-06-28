<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            'user' => [
                [
                    'name' => 'user-list',
                    'label' => 'مدیریت افراد',
                ],
                [
                    'name' => 'user-create',
                    'label' => 'ایجاد کاربر',
                ],
                [
                    'name' => 'user-edit',
                    'label' => 'ویرایش کاربر',
                ],
                [
                    'name' => 'user-delete',
                    'label' => 'حذف کاربر',
                ],
            ],
            'role' => [
                [
                    'name' => 'role-list',
                    'label' => 'مدیریت نقش',
                ],
                [
                    'name' => 'role-create',
                    'label' => 'ایجاد نقش',
                ],
                [
                    'name' => 'role-edit',
                    'label' => 'ویرایش نقش',
                ],
                [
                    'name' => 'role-delete',
                    'label' => 'حذف نقش',
                ],
                [
                    'name' => 'test_programmer',
                    'label' => 'مدیریت آزمون ها',
                ],
            ],
            'match' => [
                [
                    'name' => 'match-list',
                    'label' => 'مشاهده مسابقات',
                ],
                [
                    'name' => 'match-create',
                    'label' => 'ایجاد مسابقه',
                ],
                [
                    'name' => 'match-edit',
                    'label' => 'ویرایش مسابقه',
                ],
                [
                    'name' => 'match-delete',
                    'label' => 'حذف مسابقه',
                ],
                [
                    'name' => 'match-run-job',
                    'label' => 'اجراد جاب مسایقه',
                ],
            ],
            'event' => [
                [
                    'name' => 'event-list',
                    'label' => 'مشاهده ایونت ها',
                ],
                [
                    'name' => 'event-create',
                    'label' => 'ایجاد ایونت',
                ],
                [
                    'name' => 'event-edit',
                    'label' => 'ویرایش ایونت',
                ],
                [
                    'name' => 'event-delete',
                    'label' => 'حذف ایونت',
                ],
            ],
        ];

        foreach ($lists as $key => $items) {
            foreach ($items as $item) {
                $permission = Permission::where('name', $item['name'])->first();
                if (!$permission) {
                    Permission::create([
                        'name' => $item['name'],
                    ]);
                } else {
                    $permission->update([
                        'name' => $item['name'],
                    ]);
                }
            }
        }
    }
}
