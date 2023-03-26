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
        Schema::create('properties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->default(1);
            $table->string('title');
            $table->string('slug')->nullable();
            $table->foreignUuid('address_id')->nullable();
            $table->decimal('price', 18)->nullable();
            $table->enum('type', ['sale', 'rent'])->nullable();
            $table->enum('duration', ['hour', 'day', 'week', 'month', 'year'])->nullable();
            $table->integer('interval')->nullable();
            $table->text('description')->nullable();
            $table->foreignUuid('status_code')->default(3);
            $table->timestamps();

            $table->unique(['title', 'address_id'], 'property');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
