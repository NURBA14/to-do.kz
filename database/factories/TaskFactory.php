<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->words(3, true),
            "text" => $this->faker->paragraph(),
            "deadline" => date("Y-m-d", time() + 3600 * 24 * 21),
            "team_id" => $this->faker->numberBetween(1, 10),
            "is_done" => $this->faker->numberBetween(0, 1),
            "in_process" => 0,
            // "active" => 1,
            //-------------------------------//
            // "is_done" => 0,
            // "in_process" => 1,
            //-------------------------------//
            // "is_done" => 0,
            // "active" => 0,
            //-------------------------------//
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
