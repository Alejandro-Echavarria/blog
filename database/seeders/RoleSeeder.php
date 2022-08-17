<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $blogger = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home',
                            'description' => 'Ver dashboard'])->syncRoles([$admin, $blogger]);

        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar rol'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.roles.index',
                            'description' => 'Ver roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.create',
                            'description' => 'Crear roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.edit',
                            'description' => 'Editar roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.destroy',
                            'description' => 'Eliminar roles'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.categories.index',
                            'description' => 'Ver categorías'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.create',
                            'description' => 'Crear categorías'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.edit',
                            'description' => 'Editar categorías'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.destroy',
                            'description' => 'Eliminar categorías'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.tags.index',
                            'description' => 'Ver etiquetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.create',
                            'description' => 'Crear etiquetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.edit',
                            'description' => 'Editar etiquetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.destroy',
                            'description' => 'Eliminar etiquetas'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.posts.index',
                            'description' => 'Ver posts'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.create',
                            'description' => 'Crear posts'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.edit',
                            'description' => 'Editar posts'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.destroy',
                            'description' => 'Eliminar posts'])->syncRoles([$admin, $blogger]);
    }
}
