<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;


class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            $user = User::find(11);
            $user->assignRole($role1);      // user

            $user = User::find(12);
            $user->assignRole($role1, $role2);      // admin

            $user = User::find(13);  //  super-admin
            $user->assignRole($role3);

            DB::commit(); // Gửi các thay đổi vào cơ sở dữ liệu nếu mọi thứ thành công
        } catch (\Exception $e) {
            DB::rollback(); // Hoàn tác giao dịch nếu xảy ra lỗi
            throw $e; // Nếu cần, bạn có thể xử lý hoặc truyền lại lỗi
        }
    }
}
