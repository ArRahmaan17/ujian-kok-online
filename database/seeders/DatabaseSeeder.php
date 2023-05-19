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
        \App\Models\User::insert([
            'username' => 'dev.rahmaan',
            'password' => Hash::make('mamanrecing'),
            'is_developer' => true,
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Teacher::factory(5)->create();
        \App\Models\Lesson::factory(10)->create();
        \App\Models\Classroom::factory(5)->create();
        \App\Models\Student::factory(5)->create();
    }
}
