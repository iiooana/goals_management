<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('quiz_id');
            $table->unsignedInteger('question_id');
            $table->float('score')->nullable();
            $table->timestamps();

            $table->foreign('quiz_id')->on('quizzes')->references('id');
            $table->foreign('question_id')->on('questions')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
