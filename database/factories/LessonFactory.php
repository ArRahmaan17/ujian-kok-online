<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('id_ID')->monthName(),
            'description' => fake('id_ID')->randomLetter(),
            'hours_per_week' => fake('id_ID')->randomNumber(),
            'lesson_teacher' => \App\Models\Teacher::find(rand(1, 5))->id,
        ];
    }
}
