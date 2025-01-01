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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id'); // INTEGER, references products(product_id)
            $table->unsignedBigInteger('invoice_id'); // INTEGER REFERENCES customers(customer_id)

            $table->text('description')->nullable(); // TEXT, nullable
            $table->integer('quantity'); // INTEGER NOT NULL
            $table->decimal('unit_price', 10, 2); // DECIMAL(10,2) NOT NULL
            $table->decimal('tax_rate', 5, 2); // DECIMAL(5,2) NOT NULL
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('invoice_id')->references('id')->on('invoices')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();

            // Check constraint for item_total (requires raw SQL as Laravel doesn't natively support CHECK)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
