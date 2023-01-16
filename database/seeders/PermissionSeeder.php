<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
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
        //
        Permission::create(['name' => 'create films']);
        Permission::create(['name' => 'read films']);
        Permission::create(['name' => 'update films']);
        Permission::create(['name' => 'delete films']);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleCliente = Role::create(['name' => 'cliente']);

        $roleAdmin->givePermissionTo([
            
            'create films',
            'read films',
            'update films',
            'delete films',
        ]);

        $roleCliente->givePermissionTo([
            'read films',
        ]);
    }
}
