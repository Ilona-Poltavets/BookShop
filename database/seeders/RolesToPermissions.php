<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesToPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_to_permissions')->insert([
            'role_id'=>'1',
            'permission_id'=>'1',
        ]);
        DB::table('roles_to_permissions')->insert([
            'role_id'=>'1',
            'permission_id'=>'2',
        ]);
        DB::table('roles_to_permissions')->insert([
            'role_id'=>'1',
            'permission_id'=>'3',
        ]);
    }
}
