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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->cascadeOnDelete();

            $table->string('mark')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('mileage')->nullable();
            $table->string('capacity')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('transmission_type')->nullable();
            $table->string('drive_unit')->nullable();
            $table->string('color')->nullable();

            $table->boolean('arrested')->nullable();
            $table->boolean('pledged')->nullable();
            $table->string('in_kz')->nullable();
            $table->string('crashed')->nullable();
            $table->string('right_hand')->nullable();
            $table->string('vin')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
