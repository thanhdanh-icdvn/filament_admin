<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('ALTER TABLE departments AUTO_INCREMENT = 1');
        DB::table('departments')->delete();

        $departments = [
            [
                'name' => 'Accounting',
            ],
            [
                'name' => 'Human resources (HR)',
            ],
            [
                'name' => 'Sale',
            ],
            [
                'name' => 'Information technology',
            ],
        ];
        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
