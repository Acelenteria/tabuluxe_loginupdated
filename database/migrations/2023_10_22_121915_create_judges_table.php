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
        Schema::create('judges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('passcode');
            $table->bigInteger('contest_id')->unsigned();
            $table->string('access_token');
            $table->BigInteger('role_id')->unsigned()->default(2)->nullable();
            $table->timestamps();

            $table->foreign('contest_id')->references('id')->on('contests');
            $table->foreign('role_id')->references('id')->on('roles');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('judges');
    }
};
