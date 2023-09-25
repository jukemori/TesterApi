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

        Test::create(['name' => 'Test 1', 'project_id' => $project1->id]);
        Test::create(['name' => 'Test 2', 'project_id' => $project1->id]);
        Test::create(['name' => 'Test 3', 'project_id' => $project2->id]);
    }
}
