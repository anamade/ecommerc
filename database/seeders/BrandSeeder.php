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
        $brands = [
            'Apple',
            'Samsung',
            'Sony',
            'Nike',
            'Adidas',
            'Dell',
            'HP',
            'Canon',
            'Nikon',
            'LG',
            'Panasonic',
            'Microsoft',
            'Intel',
            'AMD',
            'ASUS',
            'Lenovo',
            'Acer',
            'Philips',
            'Bosch',
            'Siemens',
        ];

        foreach ($brands as $index => $brandName) {
            $slug = \Illuminate\Support\Str::slug($brandName);

            // Ensure the slug is unique
            $originalSlug = $slug;
            $counter = 1;
            while (Brand::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            Brand::create([
                'name' => $brandName,
                'slug' => $slug,
                'description' => "Quality products from {$brandName}",
                'website' => "https://www.{$brandName}.com",
                'is_active' => true,
                'sort_order' => $index,
            ]);
        }

        $this->command->info('Brands created successfully!');
    }
}
