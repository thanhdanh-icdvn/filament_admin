<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Hash;
use Illuminate\Database\Seeder;
use Log;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $env = env('MAIL_USERNAME', 'danhthanh418@gmail.com');

            // Attempt to create or update the user
            $admin = User::updateOrCreate(
                ['email' => $env],
                [
                    'name' => 'admin',
                    'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
                    'email_verified_at' => now(),
                ]
            );

            // Attempt to assign the role
            $admin->assignRole(Role::whereName('Super Administrator')->firstOrFail());
            DB::commit();
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            Log::error('Seeder failed: '.$e->getMessage());
            DB::rollBack();
            throw $e;
            // You can add additional handling logic here, such as sending notifications or rolling back transactions
        }

    }
}
