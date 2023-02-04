<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nom'=>$this->faker->firstNameFemale,
            'adresse'=>$this->faker->streetAddress,
            'phone'=>$this->faker->phoneNumber, 
            'email'=>$this->faker->email, 
            'date_naissance'=>$this->faker->date,
            'villeId'=>$this->faker->numberBetween($min = 1, $max = 15)
        ];
    }
}
