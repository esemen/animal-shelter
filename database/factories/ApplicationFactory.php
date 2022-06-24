<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random(),
            'animal_id' => Animal::factory(),
            'application_status_id' => ApplicationStatus::all()->random(),
            'reason' => $this->faker->paragraph,
            'applied_before' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.applied_before'))),
            'property' => [
                'type' => $this->faker->randomElement(config('mtar.application_form.options.property.type')),
                'ownership' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.property.ownership'))),
            ],
            'garden' => [
                'size' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.garden.size'))),
                'separate' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.garden.separate'))),
                'communal' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.garden.communal'))),
                'fence' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.garden.fence'))),
                'pool' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.garden.pool'))),
                'kennel' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.garden.kennel'))),
            ],
            'occupants' => [
                'children' => $this->faker->randomElements(range(1,17),rand(0,5)),
                'adults' => $this->faker->randomElements(range(18,99),rand(1,3)),
                ],
            'occupation' => [
                'working_hours' => $this->faker->paragraph,
                'wfh' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.occupation.wfh'))),
                'wfh_kept' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.occupation.wfh_kept'))),
                'hours_left' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.occupation.hours_left'))),
                'days_left' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.occupation.days_left'))),
            ],
            'experience' => [
                'past_animals' => $this->faker->paragraph,
                'other_animals' => $this->faker->paragraph,
                'reactive_dogs' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.experience.reactive_dogs'))),
                'dog_issues' => $this->faker->paragraph,
                ],
            'care' => [
                'neutered' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.care.neutered'))),
                'not_neutered' => $this->faker->paragraph,
                'inoculated' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.care.inoculated'))),
                'not_inoculated' => $this->faker->paragraph,
                'walk' => $this->faker->paragraph,
                'exercise_areas' => $this->faker->randomElement(config('mtar.application_form.options.care.exercise_areas')),
                'sleeping_area' => $this->faker->paragraph,
                'not_able_to_care' => $this->faker->paragraph,
                'puppy_neuter' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.care.puppy_neuter'))),
                'puppy_not_neuter' => $this->faker->paragraph,
                'puppy_training' => $this->faker->paragraph,
                'vet_contact' => $this->faker->paragraph,
                'insurance' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.care.insurance'))),
            ],
            'additional_info' => $this->faker->paragraph(5),
            'plans' => [
                'holiday' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.plans.holiday'))),
                'move' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.plans.move'))),
                'collect' => $this->faker->randomElement(array_keys(config('mtar.application_form.options.plans.collect'))),
            ],
            'found_through' => $this->faker->randomElement(config('mtar.application_form.options.found_through')),
        ];
    }
}
