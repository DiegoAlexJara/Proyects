<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conceptos = [
            [
                'name' => 'comics'
            ],
            [
                'name' => 'postify'
            ],
            [
                'name' => 'finanza'
            ]
        ];
        DB::table('projects')->insert($conceptos);
    }
}
