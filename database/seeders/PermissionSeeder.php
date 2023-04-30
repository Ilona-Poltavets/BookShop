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
    public function run()
    {
        DB::table('permissions')->insert([
           'name'=>'Add books',
           'label'=>'add_books'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Edit books',
            'label'=>'edit_books'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Delete books',
            'label'=>'delete_books'
        ]);
    }
}
