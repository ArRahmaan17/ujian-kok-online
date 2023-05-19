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
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('exam');
            $table->foreign('exam')
                ->references('id')
                ->on('exams')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->text('question');
            $table->string('answer_a')
                ->nullable();
            $table->string('answer_b')
                ->nullable();
            $table->string('answer_c')
                ->nullable();
            $table->string('answer_d')
                ->nullable();
            $table->string('answer_e')
                ->nullable();
            $table->string('correct_answer')
                ->nullable();
            $table->boolean('is_multiple');
            $table->boolean('done')
                ->default(false);
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_questions');
    }
};
