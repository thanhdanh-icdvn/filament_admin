<?php

namespace Database\Seeders;

use App\Models\Discount;
use DateTime;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $discounts = [
                [
                    'name' => 'New Year Sale',
                    'discount_percent' => 20.00,
                    'description' => '20% off on selected items to start the New Year',
                    'active' => true,
                    'start_date' => new DateTime('2024/01/01 08:00:00'),
                    'end_date' => new DateTime('2024/01/10 23:00:00'),
                ],
                [
                    'name' => 'Spring Refresh',
                    'discount_percent' => 15.00,
                    'description' => '15% off on all outdoor furniture',
                    'active' => false,
                    'start_date' => new DateTime('2024/03/20 08:00:00'),
                    'end_date' => new DateTime('2024/05/04 23:00:00'),
                ],
                [
                    'name' => 'Lunar New Year Sale',
                    'discount_percent' => 15.00,
                    'description' => '15% off on selected items to start the Lunar New Year',
                    'active' => false,
                    'start_date' => new DateTime('2024/01/20 08:00:00'),
                    'end_date' => new DateTime('2024/02/07 23:00:00'),
                ],
            ];

            foreach ($discounts as $discount) {
                Discount::query()
                    ->createOrFirst($discount);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
