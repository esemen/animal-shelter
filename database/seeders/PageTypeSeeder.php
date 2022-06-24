<?php

namespace Database\Seeders;

use App\Http\Controllers\CustomPageController;
use App\Models\PageType;
use Illuminate\Database\Seeder;

class PageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Standard Page
         */
        PageType::create([
            'name' => 'Standard',
            'long_name' => 'Standard',
            'slug' => 'standard'
        ]);


        /**
         * Thanks & Stories
         */
        PageType::create([
            'name' => 'Thank You',
            'long_name' => 'Thanks & Stories > Thank You',
            'slug' => 'thank-you',
            'tag' => 'thanks',
            'routable' => false,
        ]);
        PageType::create([
            'name' => 'Happy Endings',
            'long_name' => 'Thanks & Stories > Happy Endings',
            'slug' => 'happy-endings',
            'tag' => 'thanks',
            'routable' => false,
        ]);
        PageType::create([
            'name' => 'Rainbow Bridge',
            'long_name' => 'Thanks & Stories > Rainbow Bridge',
            'slug' => 'rainbow-bridge',
            'tag' => 'thanks',
            'routable' => false,
        ]);

        /**
         * Adoption
         */
        PageType::create([
            'name' => 'Adoption',
            'long_name' => 'Adoption',
            'slug' => 'adoption',
            'routable' => false,
        ]);
    }
}
