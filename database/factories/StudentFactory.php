<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $students = \App\Models\User::where('is_teacher', true);
        $arrayIds = [];
        foreach ($students->get()->toArray() as $index => $student) {
            $arrayIds[] = $student['id'];
        }
        $chosenOne = $students->where('id', fake()->shuffleArray($arrayIds))->first()->id;

        return [
            'full_name' => fake('id_ID')->lastName() . ' ' . fake('id_ID')->lastName(),
            'student_identification_number' => fake('id_ID')->randomNumber(),
            'class' => \App\Models\Classroom::find(rand(1, 5))->id,
            'homeroom_teacher' => \App\Models\Teacher::find(rand(1, 5))->id,
            'user_id' => $chosenOne,
        ];
    }
}
