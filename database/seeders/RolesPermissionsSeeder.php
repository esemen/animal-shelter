<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear cache
        app()['cache']->forget('spatie.permission.cache');

        // Permissions
        Permission::create(['name' => 'admin.view']);

        Permission::create(['name' => 'telescope.view']);

        Permission::create(['name' => 'animal.view']);
        Permission::create(['name' => 'animal.edit']);
        Permission::create(['name' => 'animal.delete']);

        Permission::create(['name' => 'application.view']);
        Permission::create(['name' => 'application.edit']);
        Permission::create(['name' => 'application.delete']);

        Permission::create(['name' => 'user.view']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.delete']);

        Permission::create(['name' => 'page.view']);
        Permission::create(['name' => 'page.edit']);
        Permission::create(['name' => 'page.delete']);

        Permission::create(['name' => 'vetter.view']);
        Permission::create(['name' => 'vetter.home-check']);




        // Roles
        $superAdminRole = Role::create(['name' => 'Super Admin']);

        $group1 = Role::create(['name' => 'Office & Outside Manager']);
        $group1->givePermissionTo(['admin.view']);
        $group1->givePermissionTo(['animal.view', 'animal.edit']);
        $group1->givePermissionTo(['application.view', 'application.edit']);
        $group1->givePermissionTo(['user.view', 'user.edit']);
        $group1->givePermissionTo(['page.view']);

        $group2 = Role::create(['name' => 'Outside Staff']);
        $group2->givePermissionTo(['admin.view']);
        $group2->givePermissionTo(['animal.view']);
        $group2->givePermissionTo(['application.view']);
        $group2->givePermissionTo(['page.view']);

        $group3 = Role::create(['name' => 'Home Check & Foster Team']);
        $group3->givePermissionTo(['admin.view']);
        $group3->givePermissionTo(['animal.view']);
        $group3->givePermissionTo(['vetter.view', 'vetter.home-check']);

        $group4 = Role::create(['name' => 'Home Check Team']);
        $group4->givePermissionTo(['admin.view']);
        $group4->givePermissionTo(['vetter.view', 'vetter.home-check']);

        $group5 = Role::create(['name' => 'Vet & Spay/Neuter Team']);
        $group5->givePermissionTo(['admin.view']);
        $group5->givePermissionTo(['animal.view']);
        $group4->givePermissionTo(['vetter.view', 'vetter.home-check']);

        $group6 = Role::create(['name' => 'Technical Support']);
        $group6->givePermissionTo(['admin.view']);
        $group6->givePermissionTo(['telescope.view']);
    }
}
