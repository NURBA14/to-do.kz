<?php

namespace Database\Seeders;

use App\Models\Profession;
use App\Models\Rank;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Team::factory(10)->create();
        Profession::factory(10)->create();
        Rank::factory(3)->create();
        User::factory(100)->create();
        Task::factory(200)->create();
        //----------------------------//
        // Task::factory(20)->create();
        // User::factory(60)->create();
    }
}
