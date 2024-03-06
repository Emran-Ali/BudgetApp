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
        Schema::create('income_costs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_id');
            $table->integer('budget');
            $table->integer('monthly_income');
            $table->integer('monthly_cost');
            $table->integer('total_income');
            $table->integer('total_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_costs');
    }
};
