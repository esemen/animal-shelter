<?php

namespace Database\Seeders;

use App\Models\ApplicationStatus;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Defaults
         *  'published' => true
         *  'completed' => false
         */

        ApplicationStatus::create([
            'name' => 'Draft',
            'slug' => 'draft',
            'published' => false,
        ]);

        ApplicationStatus::create([
            'name' => 'New',
            'slug' => 'new',
        ]);

        ApplicationStatus::create([
            'name' => 'Passed to Fosterer',
            'slug' => 'fosterer',
        ]);

        ApplicationStatus::create([
            'name' => 'Needs HV',
            'slug' => 'needs-hv',
        ]);

        ApplicationStatus::create([
            'name' => 'Passed HV',
            'slug' => 'passed-hv',
        ]);

        ApplicationStatus::create([
            'name' => 'Waiting Paperwork',
            'slug' => 'paperwork',
        ]);

        ApplicationStatus::create([
            'name' => 'Adopted',
            'slug' => 'adopted',
            'completed' => true,
        ]);

        ApplicationStatus::create([
            'name' => 'Unsuccessful',
            'slug' => 'unsuccessful',
            'completed' => true,
        ]);
    }
}
