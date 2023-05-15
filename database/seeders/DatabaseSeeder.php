<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => fake()->name(),
            'student_identification_number' => fake()->numberBetween(),
            'class' => str_shuffle("XIRMB"),
            'homeroom_teacher' => fake()->name('male'),
            'password' => Hash::make('mamanrecing'),
        ]);
    }
}
