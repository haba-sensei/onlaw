<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_rol = Role::create(['guard_name' => 'api', 'name' => 'Admin']);
        $abogado_rol = Role::create(['guard_name' => 'api', 'name' => 'Abogado']);
        $cliente_rol = Role::create(['guard_name' => 'api', 'name' => 'Cliente']);
        $baneado_rol = Role::create(['guard_name' => 'api', 'name' => 'Baneado']);
        // Permission::create(['name' => 'dash.home', 'description' => 'Ver el Dashboard', 'guard_name' => 'admin'])->syncRoles([$admin_rol, $vend_rol, $compra_rol, $caducado_rol]);

    }
}