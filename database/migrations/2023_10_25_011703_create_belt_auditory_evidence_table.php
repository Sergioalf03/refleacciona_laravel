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
        Schema::create('belt_auditory_evidence', function (Blueprint $table) {
            $table->id();
            $table->string('dir');
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
        Schema::dropIfExists('belt_auditory_evidence');
    }
};
