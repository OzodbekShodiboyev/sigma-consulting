<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin_user = new Role;
        $role_admin_user->name = "admin";
        $role_admin_user->save();
        $role_regular_user = new Role;
        $role_regular_user->name = "user";
        $role_regular_user->save();
    }
}
