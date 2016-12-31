<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        /**
         * Admin user
         *
         * Gets assigned to both roles
         */
        $adminUser = User::first();

        /**
         * Default roles
         */
        $userRole = new Role;
        $userRole->name = 'user';
        $userRole->display_name = 'Default User';
        $userRole->description = 'Default role for registered users';
        $userRole->save();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Administrator';
        $adminRole->description = 'Administrators are able to manage functionality of ther forums and other members';
        $adminRole->save();

        // Apply roles to user
        $adminUser->attachRoles([$userRole, $adminRole]);

        /**
         * Default permissions
         */
        $isAdmin = new Permission();
        $isAdmin->name = 'view-admin';
        $isAdmin->display_name = 'View Admin';
        $isAdmin->description = 'View Admin Panel';
        $isAdmin->save();

        $manageForum = new Permission();
        $manageForum->name = 'manage-forum';
        $manageForum->display_name = 'Manage Forum';
        $manageForum->description = 'Able to see and manage the forum from the admin panel';
        $manageForum->save();

        //TODO:: Add more permissions such as edit-posts and other forum related

        $adminRole->attachPermissions([$isAdmin, $manageForum]);
    }
}
