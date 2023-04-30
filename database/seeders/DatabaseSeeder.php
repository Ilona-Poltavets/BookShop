<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            GenresSeeder::class,
            PermissionSeeder::class,
            BookSeeder::class,
            RolesToPermissions::class,
            GenresToBooks::class,
        ]);
    }
}
