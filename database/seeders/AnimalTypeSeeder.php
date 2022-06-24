<?php

namespace Database\Seeders;

use App\Models\AnimalType;
use Illuminate\Database\Seeder;

class AnimalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnimalType::create(['type' => 'dog', 'name' => 'Dog', 'species' => 'Canine']);
        AnimalType::create(['type' => 'cat', 'name' => 'Cat', 'species' => 'Feline']);
        AnimalType::create(['type' => 'other', 'name' => 'Other Animal', 'species' => 'Other']);
    }
}
