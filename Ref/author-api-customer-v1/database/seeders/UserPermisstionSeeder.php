<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserPermisstionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        try {
            DB::beginTransaction();
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            // create permissions
            Permission::create(['name' => 'edit articles']);
            Permission::create(['name' => 'delete articles']);
            Permission::create(['name' => 'publish articles']);
            Permission::create(['name' => 'unpublish articles']);

            // create roles and assign existing permissions
            $role1 = Role::create(['name' => 'writer']);
            $role1->givePermissionTo('edit articles');
            $role1->givePermissionTo('delete articles');

            $role2 = Role::create(['name' => 'admin']);
            $role2->givePermissionTo('publish articles');
            $role2->givePermissionTo('unpublish articles');

            $role3 = Role::create(['name' => 'Super-Admin']);
            // gets all permissions via Gate::before rule; see AuthServiceProvider

            // create demo users
            $user = User::find(1);      // writer
            $user->assignRole($role1);

            $user = User::find(2);      // admin
            $user->assignRole($role2);

            $user = User::find(3); // super admin
            $user->assignRole($role3);
        } catch (\Exception $e) {
            DB::rollback(); // Hoàn tác giao dịch nếu xảy ra lỗi
            Log::debug("getMessage()");
            throw $e; // Nếu cần, bạn có thể xử lý hoặc truyền lại lỗi
        }
         */

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('delete articles');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = User::find(1);      // writer
        $user->assignRole($role1);

        $user = User::find(2);      // admin
        $user->assignRole($role2);

        $user = User::find(3); // super admin
        $user->assignRole($role3);
    }
}
