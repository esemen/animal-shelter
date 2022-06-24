<?php

namespace Database\Seeders;

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
            RolesPermissionsSeeder::class,
            AnimalTypeSeeder::class,
            AnimalStatusSeeder::class,
            ApplicationStatusSeeder::class,
//            PageTypeSeeder::class,
//            UserSeeder::class,
//            FostererSeeder::class,
//            VetterSeeder::class,
//            AnimalSeeder::class,
//            ApplicationSeeder::class,
//            PageSeeder::class
        ]);
    }
}
