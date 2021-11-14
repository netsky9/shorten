<?php

namespace Database\Seeders;

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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /**
         * Roles:
         * super-admin - администратор, обладает всеми правами
         * admin - мл. администратор. Роль будет использоваться тестировщиками, SEO-специалистами и т п
         * manager - работает с клиентами, помогает им с товарами
         * company - компания, будет работать в рамках своей компании и своих товаров
         * writer - контент-менеджер
         * simple - обычный пользователь с простым личным кабинетом
         */

        // create permissions
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'read category']);
        Permission::create(['name' => 'update category']);
        Permission::create(['name' => 'delete category']);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(['create category', 'read category', 'update category', 'delete category']);

        $roleManager = Role::create(['name' => 'manager']);
        $roleManager->givePermissionTo(['read category']);

        $roleCompany = Role::create(['name' => 'company']);
        $roleCompany->givePermissionTo(['read category']);

        $roleWriter = Role::create(['name' => 'writer']);
        $roleWriter->givePermissionTo(['read category']);

        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleSuperAdmin->givePermissionTo(Permission::all());

        $roleSimple = Role::create(['name' => 'simple']);


        $user = \App\Models\User::factory()->create([
            'name' => 'Администратор',
            'email' => 'admin@admin.admin',
            'password'  => bcrypt('admin'),
        ]);
        $user->assignRole($roleSuperAdmin);

        $user = \App\Models\User::factory()->create([
            'name' => 'Менеджер',
            'email' => 'manager@manager.manager',
            'password'  => bcrypt('manager'),
        ]);
        $user->assignRole($roleManager);

        $user = \App\Models\User::factory()->create([
            'name' => 'Петруха',
            'email' => 'user@user.user',
            'password'  => bcrypt('user'),
        ]);
        $user->assignRole($roleSimple);
    }
}
