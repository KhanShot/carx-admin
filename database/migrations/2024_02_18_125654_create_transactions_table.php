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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("campaign_id")->nullable();
            $table->foreign('campaign_id')->references('id')
                ->on('campaigns')->cascadeOnDelete();

            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->cascadeOnDelete();

            $table->integer('sum')->nullable();

            $table->unsignedBigInteger("form_id")->nullable();
            $table->foreign('form_id')->references('id')
                ->on('forms')->cascadeOnDelete();

            $table->string('type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
