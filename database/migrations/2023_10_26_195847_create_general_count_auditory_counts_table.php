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
            $table->integer('count1');
            $table->integer('count2');
            $table->integer('count3');
            $table->integer('count4');
            $table->integer('count5');
            $table->integer('count6');
            $table->integer('count7');
            $table->integer('count8');
            $table->integer('count9');
            $table->integer('count10');
            $table->integer('count11');
            $table->integer('count12');
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
