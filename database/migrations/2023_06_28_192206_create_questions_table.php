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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('sentence');
            $table->string('popup');
            $table->string('score');
            $table->string('condition');
            $table->string('answers');
            $table->integer('has_evidence');
            $table->integer('indx');
            $table->integer('status');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('local_id');
            $table->string('local_status');

            $table->foreign('section_id')->references('id')->on('sections');
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
        Schema::dropIfExists('questions');
    }
};
