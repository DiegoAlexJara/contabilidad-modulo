<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = config('roles_permissions.permission');

        $role = Role::create(['name' => 'Admin']);
        $role = Role::findById(1);
        foreach ($permisos as $permisos) {
            $permision = Permission::create(['name' => $permisos]);
            $role->givePermissionTo($permision);
        }
        $role = Role::create(['name' => 'User']);

        // Encuentra el usuario
        $user = User::find(1);

        // Asigna el rol 'admin' al usuario
        $user->assignRole('admin');
    }
}
