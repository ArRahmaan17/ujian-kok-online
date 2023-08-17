<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (0 == rand(100, 1000) % 2) {
            $student = true;
            $teacher = false;
        } else {
            $student = false;
            $teacher = true;
        }

        return [
            'username' => fake('id_ID')->unique()->userName(),
            'is_teacher' => $teacher,
            'is_student' => $student,
            'password' => Hash::make('mamanrecing'), // password
        ];
    }
}
