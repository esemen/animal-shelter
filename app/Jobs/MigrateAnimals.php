<?php

namespace App\Jobs;

use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Schema;

class MigrateAnimals implements ShouldQueue
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
            'id',
            'type',
            'name',
            'sex',
            'breed',
            'dob',
            'colour',
            'markings',
            'note',
            'shortdescription',
            'medicalnote',
            'othernote',
            'weight',
            'microchip',
            'update_chip',
            'pic2',
            'pic3',
            'pic4',
            'wormed',
            'fleaed',
            'incoming',
            'location',
            'locateddate',
            'kennelcough',
            'spayedneutered',
            'spaydecdue',
            'status',
            'firstjab',
            'secondjab',
            'boosterdue',
            'stitchesout',
            'assessmentnote',
            'assessment_date',
            'r_homing',
            'baby',
            'only_animal',
        ];

        // Truncate the local table
        Schema::disableForeignKeyConstraints();

        DB::table('animals')
            ->truncate();

        // Load the remote table
        $oldRecords = DB::connection('migration')
            ->table('migrate_animals')
            ->select($fields)
            //->take(1000)
            ->get()
            ->chunk($this->partition)
            ->each(fn($items) => ImportAnimals::dispatch($items)) ;
    }
}
