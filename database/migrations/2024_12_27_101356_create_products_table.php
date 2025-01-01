<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // SERIAL PRIMARY KEY
            $table->string('name', 255); // VARCHAR(255) NOT NULL
            $table->text('description')->nullable(); // TEXT, nullable
            $table->decimal('price', 10, 2); // DECIMAL(10,2) NOT NULL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
