<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Clear cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissions
        $permissions = [
            'products-view',
            'products-create',
            'products-update',
            'products-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission],
    
            );
        }

        // Roles
        $admin = Role::firstOrCreate(
            ['name' => 'admin'],
            ['guard_name' => 'api'] // <-- must set guard because permissions use 'api' guard
        );
        $staff = Role::firstOrCreate(
            ['name' => 'staff'],
            ['guard_name' => 'api']
        );
        $viewer = Role::firstOrCreate(
            ['name' => 'viewer'],
            ['guard_name' => 'api']
        );

        // Assign permissions
        $admin->givePermissionTo($permissions);

        $staff->givePermissionTo([
            'products-view',
            'products-create',
            'products-update',
        ]);

        $viewer->givePermissionTo([
            'products-view',
        ]);
    }
}