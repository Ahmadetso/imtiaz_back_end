<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
             // Seed Customers
        $customers = Customer::factory(10)->create();

        // Seed Products
        $products = Product::factory(10)->create();

        // Seed Invoices and related Invoice Items
        $customers->each(function ($customer) use ($products) {
            $invoices = Invoice::factory(10)->create(['customer_id' => $customer->id]);

            $invoices->each(function ($invoice) use ($products) {
                InvoiceItem::factory(10)->create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $products->random()->id, // Associate random product
                ]);
            });
        });
        // // User::factory(10)->create();

        // User::factory(10)->create([
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->email(),
        // ]);
    }
}
