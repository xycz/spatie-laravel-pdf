<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {    
        $items = collect()->times(rand(1, 5), function () {
            $quantity = $this->faker->numberBetween(1, 10);
            $price = $this->faker->randomFloat(2, 10, 500);

            return [
                'description' => $this->faker->sentence,
                'quantity' => $quantity,
                'price' => $price,
                'total' => $quantity * $price,
            ];
        });

        $totalAmount = $items->sum('total');       

        return [
            'number' => $this->faker->unique()->numerify('INV-########'),
            'date' => $this->faker->date(),
            'items' => $items->toJson(),
            'totalAmount' => $totalAmount,
        ];
    }
}
