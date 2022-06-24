<?php

namespace Database\Seeders;
use App\Models\Fosterer;
use Illuminate\Database\Seeder;

class FostererSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fosterer::factory(20)->create();
    }
}
