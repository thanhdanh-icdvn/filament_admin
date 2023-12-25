<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $productCategories = [
                [
                    'name' => 'Bed room',
                    'slug' => null,
                    'description' => null,
                    'thumbnail' => null,
                ],
                [
                    'name' => 'Matrass',
                    'slug' => null,
                    'description' => null,
                    'thumbnail' => null,
                ],
                [
                    'name' => 'Outdoor',
                    'slug' => null,
                    'description' => null,
                    'thumbnail' => null,
                ],
                [
                    'name' => 'Sofa',
                    'slug' => null,
                    'thumbnail' => null,
                    'description' => null,
                ],
                [
                    'name' => 'Kitchen',
                    'slug' => null,
                    'description' => null,
                    'thumbnail' => null,
                ],
                [
                    'name' => 'Living room',
                    'slug' => null,
                    'description' => null,
                    'thumbnail' => null,
                ],
            ];

            foreach ($productCategories as $productCategory) {
                ProductCategory::query()->createOrFirst($productCategory);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
