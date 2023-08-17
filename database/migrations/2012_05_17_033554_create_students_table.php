<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('student_identification_number');
            $table->integer('class');
            $table->foreign('class')
                ->references('id')
                ->on('classrooms')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->integer('homeroom_teacher');
            $table->foreign('homeroom_teacher')
                ->references('id')
                ->on('teachers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->integer('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
