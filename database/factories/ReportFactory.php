<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::get()->random()->id,
            'name_doc' => $this->faker->word,
            'vulnerabilities' => $this->faker->paragraph,
            'state' => $this->faker->word,
            'date' => $this->faker->date,
            'recommendations' => $this->faker->paragraph,
            'proposals' => $this->faker->paragraph,
            'conclusions' => $this->faker->paragraph,
        ];
    }
}
