<?php

namespace Database\Seeders;

use App\Models\OfferImage;
use Illuminate\Database\Seeder;

class OfferImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            OfferImage::query()
                ->createOrFirst([
                    'name' => 'Best Collection for Home decoration',
                    'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur aperiam natus, nulla, obcaecati nesciunt, itaque adipisci earum ducimus pariatur eaque labore.',
                    'image' => null,
                    'link' => '/',
                    'status' => true,
                ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
