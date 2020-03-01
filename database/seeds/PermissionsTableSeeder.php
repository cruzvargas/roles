<?php

use App\User;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'      => 'Admin',
            'slug'      => 'admin',
            'special'   => 'all-access'
        ]);
        User::create([
            'name'      => 'ADMIN',
            'email'      => 'admin@gmail.com',
            'password'   => bcrypt('12qwaszx')
        ]);
        User::create([
            'name'      => 'INVITADO',
            'email'      => 'invitado@gmail.com',
            'password'   => bcrypt('invitado.123')
        ]);
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);

        //Crear Permisos Iniciales
        //Usuarios
        Permission::create([
            'name'          => 'Navegar Usuarios',
            'slug'          => 'users.index',
            'description'   => 'Ver lista de Usuarios'
        ]);
        Permission::create([
            'name'          => 'Detalle Usuarios',
            'slug'          => 'users.show',
            'description'   => 'Detalle Usuarios'
        ]);
        Permission::create([
            'name'          => 'Crear Usuarios',
            'slug'          => 'users.create',
            'description'   => 'Crear Usuarios'
        ]);
        Permission::create([
            'name'          => 'Edicion Usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Edicion Usuarios'
        ]);
        Permission::create([
            'name'          => 'Eliminar Usuarios',
            'slug'          => 'users.destroy',
            'description'   => 'Eliminar Usuarios'
        ]);

        //Roles
        Permission::create([
            'name'          => 'Navegar Roles',
            'slug'          => 'roles.index',
            'description'   => 'Ver lista de Roles'
        ]);
        Permission::create([
            'name'          => 'Detalle Rol',
            'slug'          => 'roles.show',
            'description'   => 'Detalle Rol'
        ]);
        Permission::create([
            'name'          => 'Crear Rol',
            'slug'          => 'roles.create',
            'description'   => 'Crear Rol'
        ]);
        Permission::create([
            'name'          => 'Edicion Rol',
            'slug'          => 'roles.edit',
            'description'   => 'Edicion Rol'
        ]);
        Permission::create([
            'name'          => 'Eliminar Rol',
            'slug'          => 'roles.destroy',
            'description'   => 'Eliminar Rol'
        ]);

    }
}
