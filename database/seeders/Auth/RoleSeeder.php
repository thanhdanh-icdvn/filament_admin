<?php

namespace Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->delete();

        $roles = [
            [
                'name' => 'Super Administrator',
            ],
            [
                'name' => 'Administrator',
            ],
            [
                'name' => 'Writer',
            ],
            [
                'name' => 'Manager',
            ],
            [
                'name' => 'User',
            ],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
