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
        Schema::create('auditories', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('street');
            $table->string('street_type')->nullable();
            $table->string('street_way')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('auditories');
    }
};
