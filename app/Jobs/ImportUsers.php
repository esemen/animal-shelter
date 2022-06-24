<?php

namespace App\Jobs;

use App\Models\User;
use Hash;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Log;
use Str;

class ImportUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $items;

    /**
     * Create a new job instance.
     *
     * @param Collection $items
     */
    public function __construct(Collection $items)
    {
        $this->items = $items;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $this->users->each(function ($oldUser) {
//            try {
//                $user = User::create([
//                    'email' => Str::lower($oldUser->email),
//                    'password' => Hash::make(uniqid()),
//                    'title' => $oldUser->title,
//                    'first_name' => $oldUser->firstname,
//                    'last_name' => $oldUser->surname,
//                    'address1' => $oldUser->address1,
//                    'address2' => $oldUser->address2,
//                    'address3' => $oldUser->address3,
//                    'town' => $oldUser->address4,
//                    'county' => $oldUser->address5,
//                    'postcode' => trim($oldUser->postcode1 . ' ' . $oldUser->postcode2),
//                    'landline' => $oldUser->phone,
//                    'mobile' => $oldUser->phone2,
//                    'legacy_id' => $oldUser->id
//                ]);
//
//                $user->created_at = $oldUser->start_date;
//                $user->save();
//            } catch (\Exception $ex) {
//                Log::error($oldUser->id . ':' . $ex->getMessage());
//            }
//        });

        $bulkData = $this->items->map(function ($oldUser) {
            return [
                'uuid' => Str::orderedUuid()->toString(),
                'email' => Str::lower($oldUser->email),
                'password' => Hash::make(uniqid()),
                'title' => $oldUser->title,
                'first_name' => $oldUser->firstname,
                'last_name' => $oldUser->surname,
                'address1' => $oldUser->address1,
                'address2' => $oldUser->address2,
                'address3' => $oldUser->address3,
                'town' => $oldUser->address4,
                'county' => $oldUser->address5,
                'postcode' => trim($oldUser->postcode1 . ' ' . $oldUser->postcode2),
                'landline' => $oldUser->phone,
                'mobile' => $oldUser->phone2,
                'legacy_id' => $oldUser->id,
                'search_key' => Str::slug(trim($oldUser->firstname) . ' ' . trim($oldUser->surname))
            ];
        })->toArray();

        try {
            User::upsert($bulkData, ['legacy_id'], ['password']);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
    }
}
