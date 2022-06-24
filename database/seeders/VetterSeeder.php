<?php

namespace Database\Seeders;

use App\Models\Vetter;
use Illuminate\Database\Seeder;

class VetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vetter::factory(20)->create();
    }
}
