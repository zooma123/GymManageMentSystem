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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('price');
            $table->timestamps();
        });
    }









    public function down(): void
    {
        Schema::dropIfExists('subscritions');
    }
};
