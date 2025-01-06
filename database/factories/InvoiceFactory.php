<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'due_date' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'date' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'discount_amount' => fake()->randomFloat(2, 0, 500),
            'paid_amount' => fake()->randomFloat(2, 0, 1000),
            'is_fully_paid' => fake()->boolean(),
            'shipping_address' => fake()->address(),
            'customer_address' => fake()->address(),
            'customer_id' => Customer::factory()->create()->id,
            'status' => $this->faker->randomElement(['unpaid', 'paid', 'partially_paid']),


            'notes' => fake()->optional()->sentence(),
        ];
    }
}
