<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=new Role();
        $role1->name='Admin';
        $role1->label='admin';
        $role1->save();
        $role1->permissions()->attach(Permission::where('label','edit_users')->first());
        $role1->permissions()->attach(Permission::where('label','add_book')->first());
        $role1->permissions()->attach(Permission::where('label','edit_book')->first());
        $role1->permissions()->attach(Permission::where('label','delete_book')->first());
        $role1->permissions()->attach(Permission::where('label','add_genre')->first());
        $role1->permissions()->attach(Permission::where('label','edit_genre')->first());
        $role1->permissions()->attach(Permission::where('label','delete_genre')->first());

        $role2=new Role();
        $role2->name='Moderator';
        $role2->label='moderator';
        $role2->save();
        $role2->permissions()->attach(Permission::where('label','write_comments')->first());
        $role2->permissions()->attach(Permission::where('label','can_rate')->first());
        $role2->permissions()->attach(Permission::where('label','write_reviews')->first());
        $role2->permissions()->attach(Permission::where('label','edit_expert_profile')->first());
        $role2->permissions()->attach(Permission::where('label','see_rate')->first());

        $role3=new Role();
        $role3->name='user';
        $role3->label='user';
        $role3->save();
    }
}
