<?php

namespace Database\Seeders;

use App\Models\AnimalStatus;
use Illuminate\Database\Seeder;

class AnimalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnimalStatus::create(['name' => 'Pending', 'slug' => 'pending', 'public' => false]);
        AnimalStatus::create(['name' => 'Available', 'slug' => 'available', 'public' => true]);
        AnimalStatus::create(['name' => 'Not ready for adoption', 'slug' => 'not-ready', 'public' => false]);
        AnimalStatus::create(['name' => 'Reserved', 'slug' => 'reserved', 'public' => true]);
        AnimalStatus::create(['name' => 'Adopted', 'slug' => 'adopted', 'public' => false]);
        AnimalStatus::create(['name' => 'Temp Hold', 'slug' => 'temp-hold', 'public' => true]);
    }
}
