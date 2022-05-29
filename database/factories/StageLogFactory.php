<?php

namespace Database\Factories;

use App\Models\StageLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StageLog>
 */
class StageLogFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StageLog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'RxIN' => now(),
            'Notes' => $this->faker->text(200),
        ];
    }
}
