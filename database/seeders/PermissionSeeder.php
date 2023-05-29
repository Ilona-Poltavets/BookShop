<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //TODO add rule for publisher, category, rate, sale
    public function run()
    {
        DB::table('permissions')->insert([
            'name'=>'Edit users',
            'label'=>'edit_users'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Add book',
            'label'=>'add_book'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Edit book',
            'label'=>'edit_book'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Delete book',
            'label'=>'delete_book'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Add genre',
            'label'=>'add_genre'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Edit genre',
            'label'=>'edit_genre'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Delete genre',
            'label'=>'delete_genre'
        ]);
    }
}
