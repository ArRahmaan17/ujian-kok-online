<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $teachers = \App\Models\User::where('is_teacher', true);
        $arrayIds = [];
        foreach ($teachers->get()->toArray() as $index => $teacher) {
            $arrayIds[] = $teacher['id'];
        }
        $chosenOne = $teachers->where('id', fake()->shuffleArray($arrayIds))->first()->id;

        return [
            'name' => fake('id_ID')->name(),
            'teacher_identification_number' => fake()->randomNumber(),
            'phone_numbers' => fake('id_ID')->phoneNumber(),
            'user_id' => $chosenOne,
        ];
    }
}
