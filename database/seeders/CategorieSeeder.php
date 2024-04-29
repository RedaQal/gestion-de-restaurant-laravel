<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'label' => 'deserts',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table(
            'categories'
        )->insert(

                [
                    'label' => 'plats',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

        );
        DB::table(
            'categories'
        )->insert(
            [
                'label' => 'boissons',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table(
            'categories'
        )->insert(
            [
                'label' => 'salads',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table(
            'categories'
        )->insert(
            [
                'label' => 'soups',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table(
            'categories'
        )->insert(
            [
                'label' => 'sandwiches',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
