<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'add_admin',
            'edit_admin',
            'show_admin',
            'delete_admin',
            'add_user',
            'edit_user',
            'show_user',
            'delete_user',
            'add_hotel',
            'edit_hotel',
            'show_hotel',
            'delete_hotel',
            'add_room',
            'edit_room',
            'show_room',
            'delete_room',
            'change_status',
            'delete_booking',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission], [
                'name' => $permission,
                'guard_name' => 'admin',
            ]);
        }
    }
}
