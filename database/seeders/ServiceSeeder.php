<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            Service::truncate();
            $services = [
                [
                    'name' => 'Free delivery',
                    'description' => 'Orders from $200',
                    'order' => 1,
                    'icon' => 'delivery',
                ],
                [
                    'name' => 'Money returns',
                    'description' => '30 Days guarantee',
                    'order' => 2,
                    'icon' => 'money',
                ],
                [
                    'name' => '24/7 Supports',
                    'description' => 'Consumer support',
                    'order' => 3,
                    'icon' => 'question',
                ],
            ];

            foreach ($services as $service) {
                Service::query()->createOrFirst($service);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
