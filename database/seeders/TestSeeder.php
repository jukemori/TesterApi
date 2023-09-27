<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test;
use App\Models\Project;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project1 = Project::find(1);
        $project2 = Project::find(2);
        $project3 = Project::find(3);

        // Create 4 tests for each project
        for ($i = 1; $i <= 4; $i++) {
            Test::create(['name' => "Test {$i}", 'project_id' => $project1->id, 'is_successful' => $i % 2 == 0]);
            Test::create(['name' => "Test {$i}", 'project_id' => $project2->id, 'is_successful' => $i % 2 == 0]);
            Test::create(['name' => "Test {$i}", 'project_id' => $project3->id, 'is_successful' => $i % 2 == 0]);
        }
    }
}







