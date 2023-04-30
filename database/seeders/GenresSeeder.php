<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name'=>'Fantacy',
            'label'=>'fantacy',
        ]);
        DB::table('genres')->insert([
            'name'=>'Travel books',
            'label'=>'travel_books',
        ]);
        DB::table('genres')->insert([
            'name'=>'Business & Finance',
            'label'=>'business_finance',
        ]);
        DB::table('genres')->insert([
            'name'=>'Fiction',
            'label'=>'fiction',
        ]);
        DB::table('genres')->insert([
            'name'=>'Cook-books',
            'label'=>'cook_books',
        ]);
        DB::table('genres')->insert([
            'name'=>'Health',
            'label'=>'health',
        ]);
        DB::table('genres')->insert([
            'name'=>'Religious',
            'label'=>'religious ',
        ]);
        DB::table('genres')->insert([
            'name'=>'Romance',
            'label'=>'romance',
        ]);
        DB::table('genres')->insert([
            'name'=>'Thriller',
            'label'=>'thriller',
        ]);
        DB::table('genres')->insert([
            'name'=>'Mystery',
            'label'=>'mystery',
        ]);
        DB::table('genres')->insert([
            'name'=>'History',
            'label'=>'history',
        ]);
        DB::table('genres')->insert([
            'name'=>'Horror',
            'label'=>'horror',
        ]);
        DB::table('genres')->insert([
            'name'=>'Autobiography',
            'label'=>'autobiography',
        ]);
    }
}
