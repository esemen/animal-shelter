<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\AnimalStatus;
use App\Models\AnimalType;
use App\Models\RehomingStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Animal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "animal_type_id" => AnimalType::all()->random(),
            "animal_status_id" => AnimalStatus::all()->random(),
            "location_id" => rand(1, 3),
            "located_date" => $this->faker->dateTimeThisYear(),
            "name" => $this->faker->lastName,
            "sex" => $this->faker->randomElement(['Male', 'Female']),
            "breed" => $this->faker->randomElement(['Husky', 'Bulldog', 'German Shepherd', 'Dalmatian']),
            "dob" => $this->faker->dateTimeBetween('-10 years', '-6 months'),
            "colour" => $this->faker->colorName,
            "description" => $this->faker->paragraph(100),
            "short_description" => $this->faker->paragraph,
            "booking_info" => $this->faker->paragraph,
            "medical_note" => $this->faker->paragraph,
            "assessment_note" => $this->faker->paragraph,
            "other_note" => $this->faker->paragraph,
            "weight" => $this->faker->randomFloat(2, 1, 40),
            "microchip1" => $this->faker->numerify('9##############'),
            "microchip2" => $this->faker->numerify('9##############'),
            "chip_company" => $this->faker->company,
            "update_chip" => $this->faker->boolean,
            "incoming" => $this->faker->dateTimeThisMonth,
            "passport" => $this->faker->uuid,
            "first_jab" => $this->faker->dateTimeThisYear,
            "second_jab" => $this->faker->dateTimeThisYear,
            "booster_due" => $this->faker->dateTimeThisYear,
            "first_rabies" => $this->faker->dateTimeThisYear,
            "second_rabies" => $this->faker->dateTimeThisYear,
            "wormed" => $this->faker->dateTimeThisYear,
            "fleaed" => $this->faker->dateTimeThisYear,
            "kennel_cough" => $this->faker->dateTimeThisYear,
            "neutered" => $this->faker->dateTimeThisYear,
            "neuter_due" => $this->faker->dateTimeThisYear,
            "stitches_out" => $this->faker->dateTimeThisYear,
            "images" => $this->faker->randomElements(collect([1, 2, 3, 4, 5, 6, 7])->map(fn($t) => 'photo' . $t . '.jpg')->toArray(), rand(1, 4)),
            "attributes" => $this->faker->randomElements(array_keys(config('mtar.animal_attributes')), rand(0, 3))
        ];
    }
}
