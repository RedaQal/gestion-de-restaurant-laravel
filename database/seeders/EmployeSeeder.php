<?php

namespace Database\Seeders;

use App\Models\Employe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(
            'employes'
        )->insert(
            [
                'name' => 'admin',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'tel' => "0611111111",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table(
            'employes'
        )->insert(
            [
                'name' => 'serveur',
                'role' => 'agent',
                'email' => 'serveur@gmail.com',
                'password' => bcrypt('serveur'),
                'tel' => "0622222222",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table(
            'serveurs'
        )->insert(
            [
                'id_employe' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
