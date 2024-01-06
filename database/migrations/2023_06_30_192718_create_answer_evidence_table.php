<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_evidence', function (Blueprint $table) {
            $table->id();
            $table->string('dir');
            $table->string('creation_date');
            $table->unsignedBigInteger('auditory_id');
            $table->unsignedBigInteger('question_id');

            $table->foreign('auditory_id')->references('id')->on('auditories');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_evidence');
    }
};
