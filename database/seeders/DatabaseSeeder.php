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
        \App\Models\Menu::insert([
            [
                "name" => "Dashboard",
                "route" => "dashboard",
                "ordered" => 1,
                "for_developer" => true,
                "for_teacher" => true,
                "for_student" => true,
                "maintenance" => false,
                "position" => "navbar",
                "created_user" => 1,
                "created_at" => now(),
                "updated_at" => now()->addDay()
            ],
            [
                "name" => "Menu",
                "route" => "menu",
                "ordered" => 2,
                "for_developer" => true,
                "for_teacher" => false,
                "for_student" => false,
                "maintenance" => false,
                "position" => "navbar",
                "created_user" => 1,
                "created_at" => now('Asia/Jakarta')->addHour(),
                "updated_at" => now('Asia/Jakarta')->addHour()->addDay()
            ],
            [
                "name" => "Profile",
                "route" => "profile",
                "ordered" => 1,
                "for_developer" => true,
                "for_teacher" => true,
                "for_student" => true,
                "maintenance" => false,
                "position" => "control-menu",
                "created_user" => 1,
                "created_at" => now('Asia/Jakarta')->addHours(2),
                "updated_at" => now('Asia/Jakarta')->addHours(2)->addDay()
            ],
            [
                "name" => "Logout",
                "route" => "authentication.logout",
                "ordered" => 2,
                "for_developer" => true,
                "for_teacher" => true,
                "for_student" => true,
                "maintenance" => false,
                "position" => "control-menu",
                "created_user" => 1,
                "created_at" => now('Asia/Jakarta')->addHours(3),
                "updated_at" => now('Asia/Jakarta')->addHours(3)->addDay()
            ]
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Teacher::factory(5)->create();
        \App\Models\Lesson::factory(10)->create();
        \App\Models\Classroom::factory(5)->create();
        \App\Models\Student::factory(5)->create();
    }
}
