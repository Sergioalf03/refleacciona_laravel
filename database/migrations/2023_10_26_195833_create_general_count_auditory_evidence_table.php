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
        Schema::create('general_count_auditory_evidence', function (Blueprint $table) {
            $table->id();
            $table->string('dir');
            $table->string('creation_date');
            $table->unsignedBigInteger('gc_auditory_id');

            $table->foreign('gc_auditory_id')->references('id')->on('general_count_auditories');
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
        Schema::dropIfExists('general_count_auditory_evidence');
    }
};
