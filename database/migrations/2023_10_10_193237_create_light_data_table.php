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
        Schema::create('light_data', function (Blueprint $table) {
            $table->id();
            $table->boolean('status'); // Boolean column to represent the light status
            $table->dateTime('timestamp'); // A regular datetime column for the timestamp

            $table->timestamps(); // This will automatically add 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('light_data');
    }
};
