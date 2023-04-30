<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresToBooks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres_to_books')->insert([
            'genre_id'=>1,
            'books_id'=>1
        ]);
        DB::table('genres_to_books')->insert([
            'genre_id'=>1,
            'books_id'=>2
        ]);
        DB::table('genres_to_books')->insert([
            'genre_id'=>12,
            'books_id'=>2
        ]);
        DB::table('genres_to_books')->insert([
            'genre_id'=>8,
            'books_id'=>3
        ]);
        DB::table('genres_to_books')->insert([
            'genre_id'=>1,
            'books_id'=>3
        ]);
        DB::table('genres_to_books')->insert([
            'genre_id'=>1,
            'books_id'=>4
        ]);
        DB::table('genres_to_books')->insert([
            'genre_id'=>3,
            'books_id'=>5
        ]);
        DB::table('genres_to_books')->insert([
            'genre_id'=>13,
            'books_id'=>6
        ]);
    }
}
