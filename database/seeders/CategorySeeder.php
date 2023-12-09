<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();
        $categoryList =
        [
            [
                'name' => 'Living Room',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Sofas', 'parent_id' => null],
                    ['name' => 'Sectionals', 'parent_id' => null],
                    ['name' => 'Chairs', 'parent_id' => null],
                    ['name' => 'Coffee Tables', 'parent_id' => null],
                    ['name' => 'End Tables', 'parent_id' => null],
                    ['name' => 'Entertainment Centers', 'parent_id' => null],
                    ['name' => 'Bookshelves', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Dining Room',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Dining Tables', 'parent_id' => null],
                    ['name' => 'Dining Chairs', 'parent_id' => null],
                    ['name' => 'Buffets and Sideboards', 'parent_id' => null],
                    ['name' => 'China Cabinets', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Bedroom',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Beds', 'parent_id' => null],
                    ['name' => 'Mattresses', 'parent_id' => null],
                    ['name' => 'Nightstands', 'parent_id' => null],
                    ['name' => 'Dressers', 'parent_id' => null],
                    ['name' => 'Wardrobes', 'parent_id' => null],
                    ['name' => 'Armoires', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Home Office',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Desks', 'parent_id' => null],
                    ['name' => 'Office Chairs', 'parent_id' => null],
                    ['name' => 'Bookcases', 'parent_id' => null],
                    ['name' => 'Filing Cabinets', 'parent_id' => null],
                    ['name' => 'Computer Tables', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Outdoor',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Patio Sets', 'parent_id' => null],
                    ['name' => 'Outdoor Sofas', 'parent_id' => null],
                    ['name' => 'Dining Sets', 'parent_id' => null],
                    ['name' => 'Adirondack Chairs', 'parent_id' => null],
                    ['name' => 'Hammocks', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'For Children',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Cribs', 'parent_id' => null],
                    ['name' => 'Changing Tables', 'parent_id' => null],
                    ['name' => 'Kids\' Beds', 'parent_id' => null],
                    ['name' => 'Play Tables', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Storage',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Shelving Units', 'parent_id' => null],
                    ['name' => 'Cabinets', 'parent_id' => null],
                    ['name' => 'Storage Benches', 'parent_id' => null],
                    ['name' => 'Chest', 'parent_id' => null],
                    ['name' => 'Ottomans with Storage', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Accent',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Accent Chairs', 'parent_id' => null],
                    ['name' => 'Side Tables', 'parent_id' => null],
                    ['name' => 'Console Tables', 'parent_id' => null],
                    ['name' => 'Accent Chests', 'parent_id' => null],
                    ['name' => 'Decorative Mirrors', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Entryway',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Entryway Benches', 'parent_id' => null],
                    ['name' => 'Hall Trees', 'parent_id' => null],
                    ['name' => 'Shoe Racks', 'parent_id' => null],
                    ['name' => 'Coat Racks', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'For Bar',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Bar Cabinets', 'parent_id' => null],
                    ['name' => 'Bar Carts', 'parent_id' => null],
                    ['name' => 'Bar Stools', 'parent_id' => null],
                    ['name' => 'Wine Racks', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Bathroom',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Bathroom Vanities', 'parent_id' => null],
                    ['name' => 'Medicine Cabinets', 'parent_id' => null],
                    ['name' => 'Over The Toilet Storage', 'parent_id' => null],
                    ['name' => 'Bathroom Shelves', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Accessories',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Throw Pillows', 'parent_id' => null],
                    ['name' => 'Cushions', 'parent_id' => null],
                    ['name' => 'Rugs', 'parent_id' => null],
                    ['name' => 'Lighting Fixtures', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Antique and Vintage',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Antique Chair', 'parent_id' => null],
                    ['name' => 'Vintage Tables', 'parent_id' => null],
                    ['name' => 'Retro Furniture', 'parent_id' => null],
                    ['name' => 'Collectibles', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'Custom and Handcrafted',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Custom-Made Sofas', 'parent_id' => null],
                    ['name' => 'Handcrafted Tables', 'parent_id' => null],
                    ['name' => 'Bespoke Furniture Pieces', 'parent_id' => null],
                ],
            ],
            [
                'name' => 'For Special Needs',
                'parent_id' => null,
                'children' => [
                    ['name' => 'Adaptive', 'parent_id' => null],
                    ['name' => 'Ergonomic Chairs', 'parent_id' => null],
                    ['name' => 'Specialized Beds', 'parent_id' => null],
                ],
            ],
        ];
        foreach ($categoryList as $categoryData) {
            $parentCategory = Category::create([
                'name' => $categoryData['name'],
                'parent_id' => $categoryData['parent_id'],
                'slug' => Str::slug($categoryData['name']), // Generate a slug
            ]);

            if (isset($categoryData['children']) && is_array($categoryData['children'])) {
                foreach ($categoryData['children'] as $childData) {
                    Category::create([
                        'name' => $childData['name'],
                        'parent_id' => $parentCategory->id,
                        'slug' => Str::slug($childData['name']), // Generate a slug
                    ]);
                }
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
