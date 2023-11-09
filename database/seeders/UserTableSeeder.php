<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->name = "Adminstrator";
        $admin->username = "admin";
        $admin->email = "admin@sigma.uz";
        $admin->password = Hash::make("sigma2023");
        $admin->save();
        $admin->roles()->attach(Role::where('name','admin')->first());
    }
}
