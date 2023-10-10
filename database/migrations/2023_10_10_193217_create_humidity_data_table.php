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
        Schema::create('humidity_data', function (Blueprint $table) {
            $table->id();
            $table->decimal('value', 5, 2); // Define the precision and scale based on your requirements
            $table->dateTime('timestamp'); // A regular datetime column for the timestamp

            $table->timestamps(); // This will automatically add 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humidity_data');
    }
};
