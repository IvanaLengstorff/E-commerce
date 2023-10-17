<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Empleado']);
        $role3 = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'cruds'])->syncRoles([$role1]);
        Permission::create(['name' => 'venta'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'cliente'])->syncRoles([$role1, $role2, $role3]);
    }
}
