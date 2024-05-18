<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table(
            'categories'
        )->insert(
            [
                'label' => 'Deserts',
                'img_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table(
            'categories'
        )->insert(

            [
                'label' => 'Pizza',
                'img_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        );
        DB::table(
            'categories'
        )->insert(
            [
                'label' => 'boissons',
                'img_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table(
            'categories'
        )->insert(
            [
                'label' => 'salads',
                'img_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table(
            'categories'
        )->insert(
            [
                'label' => 'soups',
                'img_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table(
            'categories'
        )->insert(
            [
                'label' => 'Tacos',
                'img_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
