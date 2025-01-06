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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); // INTEGER REFERENCES customers(customer_id)
            $table->date('date'); // DATE NOT NULL
            $table->date('due_date'); // DATE NOT NULL
            $table->decimal('discount_amount', 10, 2)->default(0); // DECIMAL(10,2) DEFAULT 0
            $table->decimal('paid_amount', 10, 2)->default(0); // DECIMAL(10,2) DEFAULT 0
            $table->boolean('is_fully_paid')->default(false); // BOOLEAN DEFAULT false
            $table->string('shipping_address')->default(null); // BOOLEAN DEFAULT false
            $table->string('customer_address')->default(null); // BOOLEAN DEFAULT false
            $table->text('notes')->nullable(); // TEXT, nullable
            $table->enum('status', ['unpaid', 'paid', 'partially_paid'])->default('unpaid');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();

            // Check constraint for total_amount (requires raw SQL as Laravel doesn't support CHECK natively)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
