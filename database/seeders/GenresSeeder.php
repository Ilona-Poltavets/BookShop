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
            'name' => 'Fantacy',
            'name_ukr' => 'Фентезі',
//            'label'=>'fantacy',
        ]);
        DB::table('genres')->insert([
            'name' => 'Travel books',
            'name_ukr' => 'Подорож',
//            'label'=>'travel_books',
        ]);
        DB::table('genres')->insert([
            'name' => 'Business & Finance',
            'name_ukr' => 'Бізнес та фінанси',
//            'label'=>'business_finance',
        ]);
        DB::table('genres')->insert([
            'name' => 'Fiction',
            'name_ukr' => 'Художня література',
//            'label'=>'fiction',
        ]);
        DB::table('genres')->insert([
            'name' => 'Cook-books',
            'name_ukr' => 'Кулінарія',
//            'label'=>'cook_books',
        ]);
        DB::table('genres')->insert([
            'name' => 'Health',
            'name_ukr' => 'Медицина',
//            'label'=>'health',
        ]);
        DB::table('genres')->insert([
            'name' => 'Religious',
            'name_ukr' => 'Релігійна література',
//            'label'=>'religious ',
        ]);
        DB::table('genres')->insert([
            'name' => 'Romance',
            'name_ukr' => 'Романтика',
//            'label'=>'romance',
        ]);
        DB::table('genres')->insert([
            'name' => 'Thriller',
            'name_ukr' => 'Триллер',
//            'label'=>'thriller',
        ]);
        DB::table('genres')->insert([
            'name' => 'Mystery',
            'name_ukr' => 'Містичність',
//            'label'=>'mystery',
        ]);
        DB::table('genres')->insert([
            'name' => 'History',
            'name_ukr' => 'Історія',
//            'label'=>'history',
        ]);
        DB::table('genres')->insert([
            'name' => 'Horror',
            'name_ukr' => 'Жахи',
//            'label'=>'horror',
        ]);
        DB::table('genres')->insert([
            'name' => 'Autobiography',
            'name_ukr' => 'Автобіографія',
//            'label'=>'autobiography',
        ]);
    }
}
