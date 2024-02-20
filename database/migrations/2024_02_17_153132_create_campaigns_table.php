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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('bin')->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->cascadeOnDelete();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('telegram')->nullable();
            $table->string('min_year')->nullable();
            $table->boolean('pledged')->nullable();
            $table->boolean('arrested')->nullable();
            $table->boolean('crashed')->nullable();
            $table->boolean('right_hand')->nullable();
            $table->boolean('in_kz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
