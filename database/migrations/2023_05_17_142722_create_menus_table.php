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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('route');
            $table->integer('ordered');
            $table->boolean('for_developer')
                ->default(true);
            $table->boolean('for_teacher')
                ->default(false);
            $table->boolean('for_student')
                ->default(false);
            $table->boolean('maintenance')
                ->default(false);
            $table->string('position');
            $table->integer('created_user');
            $table->foreign('created_user')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
