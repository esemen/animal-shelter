<?php

namespace App\Jobs;

use App\Models\Animal;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Schema;

class MigrateApplications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $partition;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($partition = 500)
    {
        $this->partition = $partition;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fields = [
            'aid',
            'email',
            'adopt_reason',
            'property_type',
            'owner_or_rent',
            'occupation',
            'hours_dog_left',
            'days_dog_left',
            'current_animal',
            'prev_dog',
            'times_dog_walked',
            'puppy_spayed_neutered',
            'vet_contact',
            'vet_insurance',
            'sleeping_area',
            'exercise_area',
            'training_intensions',
            'other_info',
            'found_site_through',
            'appstatus',
            'did',
            'adate',
        ];

        // Truncate the local table
        Schema::disableForeignKeyConstraints();

        DB::table('applications')
            ->truncate();

        $animals = Animal::select('legacy_id')->get()->pluck('legacy_id');

        // Load the remote table
        $oldRecords = DB::connection('migration')
            ->table('applications')
            ->select($fields)
            ->where('adate', '>', '2018-01-01')
            ->where('email', 'like', '%@%')
            ->whereIn('did', $animals)
            ->orderBy('adate', 'desc')
            ->get()
            ->unique(function ($item) {
                return trim(strtolower($item->email)) . '-' . $item->did;
            })
            ->chunk($this->partition)
            ->each(fn($items) => ImportApplications::dispatch($items));
    }
}
