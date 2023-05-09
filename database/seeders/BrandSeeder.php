<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Hyundai',
                'result' => 100,
                'description' => 'Hyundai is a South Korean multinational automotive manufacturer headquartered in Seoul.',
            ],
            [
                'name' => 'Toyota',
                'result' => 100,
                'description' => 'Toyota is a Japanese multinational automotive manufacturer headquartered in Toyota, Aichi, Japan.',
            ],
            [
                'name' => 'Honda',
                'result' => 100,
                'description' => 'Honda is a Japanese public multinational conglomerate corporation primarily known as a manufacturer of automobiles, motorcycles, and power equipment.',
            ]
        ])->each(function ($brand) {
            $brand = \App\Models\Brand::create($brand);
            $brand->event_partner()->attach(\App\Models\Event::all()->random()->id);
        });
    }
}
