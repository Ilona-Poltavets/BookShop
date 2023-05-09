<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('label', 'admin')->first();
        $moderator = Role::where('label', 'moderator')->first();

        $user1 = new User();
        $user1->name = 'admin';
        $user1->email = 'example@test.com';
        $user1->password = Hash::make('test');
        $user1->save();
        $user1->roles()->attach($admin);

        $user2 = new User();
        $user2->name = 'editor';
        $user2->email = 'random@gmail.com';
        $user2->password = Hash::make('test');
        $user2->save();
        $user2->roles()->attach($moderator);
//        DB::table('users')->insert([
//            'name' => 'admin',
//            'email' => 'example@test.com',
//            'password' => Hash::make('test'),
//        ]);
    }
}
