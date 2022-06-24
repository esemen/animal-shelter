<?php

namespace App\Jobs;

use App\Models\Animal;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Log;
use Str;

class ImportApplications implements ShouldQueue
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
        $statusList = ApplicationStatus::select('id', 'name')->get()->pluck('id', 'name');
        $userList = User::select('id', 'email')->get();
        $animalList = Animal::select('id', 'legacy_id')->get()->pluck('id','legacy_id');

        $this->items->each(function ($old) use ($statusList, $userList, $animalList) {

            $user = $userList->first(function ($value, $key) use ($old) {
                return $value->email == trim(strtolower($old->email));
            });

            $animal = $animalList->get($old->did);

            if ($user && $animal) {
                $application = new Application;

                $property = [
                    'type' => $old->property_type,
                    'ownership' => $old->owner_or_rent == 'Owner' ? 'own' : 'rent'
                ];

                $occupation = [
                    'hours_left' => collect(config('mtar.application_form.options.occupation.hours_left'))->flip()->get($old->hours_dog_left),
                    'days_left' => collect(config('mtar.application_form.options.occupation.days_left'))->flip()->get($old->days_dog_left)
                ];

                $experience = [
                    'other_animals' => $old->current_animal,
                    'past_animals' => $old->prev_dog,
                ];

                $care = [
                    'walk' => $old->times_dog_walked,
                    'sleeping_area' => $old->sleeping_area,
                    'exercise_areas' => $old->exercise_area,
                    'vet_contact' => $old->vet_contact,
                    'vet_insurance' => Str::contains($old->vet_insurance, 'nsur') ? 'insurance' : 'payg',
                    'puppy_training' => $old->training_intensions,
                ];

                $application->fill([
                    'legacy_id' => $old->aid,
                    'reason' => $old->adopt_reason,
                    'property' => $property,
                    'occupation' => $occupation,
                    'experience' => $experience,
                    'care' => $care,
                    'additional_info' => $old->other_info,
                    'found_through' => $old->found_site_through,
                ]);

                $application->user()->associate($user);
                $application->animal()->associate($animal);
                $application->status()->associate($statusList->get($old->appstatus));

                try {
                    $application->save();

                    $application->created_at = $old->adate;
                    $application->save();
                }
                catch (\Exception $ex) {
                    Log::error('Error in application id ' . $old->aid, ['error' => $ex->getMessage(), 'app' => $old, 'user' => $user->email]);
                }
            }
        });
    }
}
