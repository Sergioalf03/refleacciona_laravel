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
        Schema::create('general_count_auditory_counts', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_type');
            $table->integer('origin');
            $table->integer('destination');
            $table->string('creation_date');
            $table->unsignedBigInteger('general_count_auditory_id');

            $table->foreign('general_count_auditory_id')->references('id')->on('general_count_auditories');
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
        Schema::dropIfExists('general_count_auditory_counts');
    }
};
