<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\ApplicationStatus;
use App\Models\Fosterer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FostererFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fosterer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'approved_at' => rand(0,1) ? null : $this->faker->dateTimeThisYear,
            'fostering' => [
                'start' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.fostering.start'))),
                'continue' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.fostering.continue'))),
                'transport' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.fostering.transport'))),
                'collection' => $this->faker->randomElements(array_keys(config('mtar.fosterer_form.options.fostering.collection')), rand(1,4)),
                'nearest' => $this->faker->paragraph,
                'older' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.fostering.older'))),
                'prospective' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.fostering.prospective'))),
                'bad_candidate' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.fostering.bad_candidate'))),
            ],
            'property' => [
                'type' => $this->faker->randomElement(config('mtar.fosterer_form.options.property.type')),
                'ownership' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.property.ownership'))),
            ],
            'garden' => [
                'size' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.garden.size'))),
                'separate' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.garden.separate'))),
                'communal' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.garden.communal'))),
                'fence' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.garden.fence'))),
                'pool' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.garden.pool'))),
                'kennel' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.garden.kennel'))),
            ],
            'occupants' => [
                'children' => $this->faker->randomElements(range(1,17),rand(0,5)),
                'visitor' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.occupants.visitor'))),
                'adults' => $this->faker->randomElements(range(18,99),rand(1,3)),
            ],
            'occupation' => [
                'working_hours' => $this->faker->paragraph,
                'wfh' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.occupation.wfh'))),
                'wfh_kept' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.occupation.wfh_kept'))),
                'hours_left' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.occupation.hours_left'))),
                'days_left' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.occupation.days_left'))),
            ],
            'experience' => [
                'applied_before' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.experience.applied_before'))),
                'fostered_before' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.experience.fostered_before'))),
                'fostered_before_info' => $this->faker->paragraph,
                'past_animals' => $this->faker->paragraph,
                'other_animals' => $this->faker->paragraph,
                'resident_dogs' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.experience.resident_dogs'))),
                'reactive_dogs' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.experience.reactive_dogs'))),
                'dog_issues' => $this->faker->paragraph,
            ],
            'care' => [
                'neutered' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.care.neutered'))),
                'not_neutered' => $this->faker->paragraph,
                'inoculated' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.care.inoculated'))),
                'not_inoculated' => $this->faker->paragraph,
                'walk' => $this->faker->paragraph,
                'exercise_areas' => $this->faker->randomElement(config('mtar.fosterer_form.options.care.exercise_areas')),
                'sleeping_area' => $this->faker->paragraph,
                'vetter' => $this->faker->paragraph,
            ],
            'additional_info' => $this->faker->paragraph(5),
            'plans' => [
                'move' => $this->faker->randomElement(array_keys(config('mtar.fosterer_form.options.plans.move'))),
            ],
        ];
    }
}
