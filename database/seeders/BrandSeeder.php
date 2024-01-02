<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            Brand::truncate();
            $brands = [
                ['name' => 'IKEA', 'logo' => null, 'website' => 'https://www.ikea.com'],
                ['name' => 'Ashley HomeStore', 'logo' => null, 'website' => 'https://www.ashleyfurniture.com'],
                ['name' => 'La-Z-Boy', 'logo' => null, 'website' => 'https://www.la-z-boy.com'],
                ['name' => 'Ethan Allen', 'logo' => null, 'website' => 'https://www.ethanallen.com'],
                ['name' => 'Herman Miller', 'logo' => null, 'website' => 'https://www.hermanmiller.com'],
                ['name' => 'Rooms To Go', 'logo' => null, 'website' => 'ttps://www.roomstogo.com'],
                ['name' => 'Bassett Furniture', 'logo' => null, 'website' => 'https://www.bassettfurniture.com'],
                ['name' => 'Raymour & Flanigan', 'logo' => null, 'website' => 'https://www.raymourflanigan.com'],
                ['name' => 'Bob\'s Discount Furniture', 'logo' => null, 'website' => 'https://www.mybobs.com'],
                ['name' => 'Crate & Barrel', 'logo' => null, 'website' => 'https://www.crateandbarrel.com'],
                ['name' => 'West Elm', 'logo' => null, 'website' => 'https://www.westelm.com'],
                ['name' => 'Pottery Barn', 'logo' => null, 'website' => 'https://www.potterybarn.com'],
                ['name' => 'Wayfair', 'logo' => null, 'website' => 'https://www.wayfair.com'],
                ['name' => 'CB2', 'logo' => null, 'website' => 'https://www.cb2.com'],
                ['name' => 'Design Within Reach', 'logo' => null, 'website' => 'https://www.dwr.com'],
                ['name' => 'Restoration Hardware', 'logo' => null, 'website' => 'https://www.rh.com'],
                ['name' => 'Williams-Sonoma Home', 'logo' => null, 'website' => 'https://www.williams-sonoma.com/'],
                ['name' => 'Pier 1 Imports', 'logo' => null, 'website' => 'https://www.pier1.com'],
                ['name' => 'The Container Store', 'logo' => null, 'website' => 'https://www.containerstore.com'],
                ['name' => 'Lowe\'s', 'logo' => null, 'website' => 'https://www.lowes.com'],
            ];

            foreach ($brands as $brand) {
                Brand::query()->createOrFirst($brand);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
