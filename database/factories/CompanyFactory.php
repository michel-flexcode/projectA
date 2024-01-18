<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'web' => $this->faker->url,
            'mail_domain' => $this->faker->domainName,
            'logo' => $this->faker->imageUrl(),
            // Add any other attributes as needed for the Company model
        ];
    }
}
