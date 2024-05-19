<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorie_imgs')->insert([[
            'url' => 'categories/burger.png'
        ],
        [
            'url' => 'categories/pizza.png'
        ],
        [
            'url' => 'categories/salade.png'
        ],
        [
            'url' => 'categories/sandwich.png'
        ],
        [
            'url' => 'categories/gateau.png'
        ],
        [
            'url' => 'categories/soupe.png'
        ],
        [
            'url' => 'categories/jus.png'
        ],
        [
            'url' => 'categories/plat.png'
        ],
        [
            'url' => 'categories/sushi.png'
        ]
    ]);
    }
}
