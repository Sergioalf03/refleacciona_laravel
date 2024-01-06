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
        Schema::create('belt_auditory_counts', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_type');
            $table->integer('origin');
            $table->integer('destination');
            $table->integer('adults_count');
            $table->integer('belts_count');
            $table->integer('child_count');
            $table->integer('chairs_count');
            $table->integer('coopilot');
            $table->integer('overuse_count');
            $table->string('creation_date');
            $table->unsignedBigInteger('belt_auditory_id');

            $table->foreign('belt_auditory_id')->references('id')->on('belt_auditory');
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
        Schema::dropIfExists('belt_auditory_counts');
    }
};
