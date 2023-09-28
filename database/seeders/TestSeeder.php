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
        $projects = Project::whereIn('id', [1, 2, 3])->get();

        foreach ($projects as $project) {
            // Create 3 tests for each project with names like "Test 1," "Test 2," etc.
            for ($i = 1; $i <= 3; $i++) {
                Test::create([
                    'name' => "Test {$project->id}-{$i}",
                    'project_id' => $project->id,
                    'is_successful' => $i % 2 == 0,
                ]);
            }
        }
    }

}







