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

        // Create 5 different tests across the 3 projects
        Test::create(['name' => 'Test 1', 'project_id' => $project1->id, 'is_successful' => true]);
        Test::create(['name' => 'Test 2', 'project_id' => $project1->id, 'is_successful' => false]);
        Test::create(['name' => 'Test 3', 'project_id' => $project2->id, 'is_successful' => true]);
        Test::create(['name' => 'Test 4', 'project_id' => $project3->id, 'is_successful' => false]);
        Test::create(['name' => 'Test 5', 'project_id' => $project3->id, 'is_successful' => true]);
    }
}
