<?php

namespace Database\Seeders;

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
                'name' => 'admin',
            ],
            [
                'name' => 'user',
            ],
            [
                'name' => 'writter',
            ],
            [
                'name' => 'manager',
            ],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
