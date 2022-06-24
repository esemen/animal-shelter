<?php

namespace App\Jobs;

use App\Models\Animal;
use App\Models\AnimalStatus;
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

class ImportAnimals implements ShouldQueue
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
        $statusList = AnimalStatus::select('id', 'name')->get()->pluck('id', 'name');
        $userList = User::select('id', 'legacy_id')->get()->pluck('id', 'legacy_id');

        $this->items->each(function ($old) use ($statusList, $userList) {
            try {

                $old->weight = trim(str_replace('kg', '', strtolower($old->weight)));
                $old->weight = is_numeric($old->weight) ? $old->weight : null;

                $animal = new Animal;

                $animal->fill([
                    'uuid' => Str::orderedUuid()->toString(),
                    'type' => $old->type,
                    'name' => $old->name,
                    'sex' => $old->sex,
                    'breed' => $old->breed,
                    'dob' => $old->dob == '0000-00-00' ? null : $old->dob,
                    'colour' => $old->colour,
                    'markings' => $old->markings,
                    'description' => $old->note,
                    'short_description' => $old->shortdescription,
                    'medical_note' => $old->medicalnote,
                    'other_note' => $old->othernote,
                    'weight' => $old->weight,
                    'microchip1' => $old->microchip,
                    'wormed' => $old->wormed == '0000-00-00' ? null : $old->wormed,
                    'fleaed' => $old->fleaed == '0000-00-00' ? null : $old->fleaed,
                    'incoming' => $old->incoming == '0000-00-00' ? null : $old->incoming,
                    'kennel_cough' => $old->kennelcough == '0000-00-00' ? null : $old->kennelcough,
                    'neutered' => $old->spayedneutered == '0000-00-00' ? null : $old->spayedneutered,
                    'neuter_due' => $old->spaydecdue == '0000-00-00' ? null : $old->spaydecdue,
                    'first_jab' => $old->firstjab == '0000-00-00' ? null : $old->firstjab,
                    'second_jab' => $old->secondjab == '0000-00-00' ? null : $old->secondjab,
                    'booster_due' => $old->boosterdue == '0000-00-00' ? null : $old->boosterdue,
                    'stitches_out' => $old->stitchesout == '0000-00-00' ? null : $old->stitchesout,
                    'assessment_note' => $old->assessmentnote,
                    'assessment_date' => $old->assessment_date == '0000-00-00' ? null : $old->assessment_date,
                    'located_date' => $old->locateddate == '0000-00-00' ? null : $old->locateddate,
                    'legacy_id' => $old->id,
                ]);

                $animal->images = [
                    $old->pic2,
                    $old->pic3,
                    $old->pic4
                ];

                $attributes = [];
                if ($old->baby) $attributes[] = 'children';
                if ($old->only_animal) $attributes[] = 'only_animal';

                $animal->attributes = $attributes;

                $animal->type()->associate($old->type);

                if ($statusList->get($old->status)) {
                    $animal->status()->associate($statusList->get($old->status));
                }

                if ($old->r_homing == 'Passed2fosterer')
                    $animal->status()->associate($statusList->get('Temp Hold'));

                if ($userList->get($old->location)) {
                    $animal->location()->associate($userList->get($old->location));
                }

                $animal->save();
            } catch (\Exception $ex) {
                Log::error($ex->getMessage(), ['animal' => $old]);
            }
        });
    }
}
