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

        $testNames = [
            'Login Test',
            'Registration Test',
            'Homepage Test',
            'Product Page Test',
            'Shopping Cart Test',
            'Checkout Test',
            'Payment Test',
            'Profile Test',
            'Settings Test',
        ];

        $testNameCount = count($testNames);

        foreach ($projects as $project) {
            for ($i = 0; $i < 3; $i++) {
                // Create 3 tests for each project with real test case names.
                $index = ($project->id - 1) * 3 + $i;
                $testName = $testNames[$index % $testNameCount];
                Test::create([
                    'name' => $testName,
                    'project_id' => $project->id,
                    'is_successful' => $i % 2 == 0,
                ]);
            }
        }
    }


}







