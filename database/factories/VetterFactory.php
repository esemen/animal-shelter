<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vetter;
use Illuminate\Database\Eloquent\Factories\Factory;

class VetterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vetter::class;

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
            'travel' => $this->faker->randomElement(config('mtar.vetter_form.options.travel')),
            'home_check' => $this->faker->randomElement(config('mtar.vetter_form.options.home_check')),
            'transport' => $this->faker->randomElement(config('mtar.vetter_form.options.transport')),
            'own_dog' => $this->faker->randomElement(config('mtar.vetter_form.options.own_dog')),
            'additional_info' => $this->faker->paragraph(5),
            'other_rescues' => $this->faker->paragraph(5),
            'dogs_adopted' => $this->faker->paragraph(5),
        ];
    }
}
