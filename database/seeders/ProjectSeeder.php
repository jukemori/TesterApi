<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Project::create(['name' => 'Project 1']);
        Project::create(['name' => 'Project 2']);
        Project::create(['name' => 'Project 3']);
    }
}
