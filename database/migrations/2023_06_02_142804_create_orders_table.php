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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('food')->unsigned();
            $table->foreign('food')->references('id')->on('food');
            $table->bigInteger('client')->unsigned();
            $table->foreign('client')->references('id')->on('clients');
            $table->bigInteger('price');
            $table->bigInteger('amount');
            $table->boolean('is_paid');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};