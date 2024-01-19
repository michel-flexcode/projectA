<?php

namespace Database\Factories;

use App\Models\ScopeVulnerability;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poc>
 */
class PocFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'conclusion' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'scope_vulnerability_id' => ScopeVulnerability::factory(),
            'ordre' => $this->faker->randomNumber(),
            // Add any other fields you want to generate data for
        ];
    }
}
