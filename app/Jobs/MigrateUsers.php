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

class MigrateUsers implements ShouldQueue
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
            'surname',
            'firstname',
            'title',
            'address1',
            'address2',
            'address3',
            'address4',
            'address5',
            'postcode1',
            'postcode2',
            'phone',
            'phone2',
            'email',
            'start_date',
        ];

        // Truncate the local table
        Schema::disableForeignKeyConstraints();

        DB::table('users')
            ->truncate();

        // Load the remote table
        $oldUsers = DB::connection('migration')
            ->table('migrate_persons')
            ->select($fields)
            ->orderBy('start_date')
            //->take(100)
            ->get()
            ->chunk($this->partition)
            ->each(fn($users) => ImportUsers::dispatch($users)) ;
    }
}
