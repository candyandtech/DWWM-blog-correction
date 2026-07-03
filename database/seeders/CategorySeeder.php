<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('categories')->insert([
            [
                'name' => 'Productivité',
                'slug' => 'productivite',
                'created_at' => now(),
            ],
            [
                'name' => 'Organisation',
                'slug' => 'organisation',
                'created_at' => now(),
            ],
            [
                'name' => 'Développement personnel',
                'slug' => 'developpement-personnel',
                'created_at' => now(),
            ],
            [
                'name' => 'Lecture',
                'slug' => 'lecture',
                'created_at' => now(),
            ],
            [
                'name' => 'Voyage',
                'slug' => 'voyage',
                'created_at' => now(),
            ],
            [
                'name' => 'Travail',
                'slug' => 'travail',
                'created_at' => now(),
            ],
            [
                'name' => 'Formation',
                'slug' => 'formation',
                'created_at' => now(),
            ],
            [
                'name' => 'Créativité',
                'slug' => 'creativite',
                'created_at' => now(),
            ],
            [
                'name' => 'Habitudes',
                'slug' => 'habitudes',
                'created_at' => now(),
            ],
            [
                'name' => 'Bien-être',
                'slug' => 'bien-etre',
                'created_at' => now(),
            ],
        ]);
    }
}
