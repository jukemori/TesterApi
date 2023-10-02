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
        
        Project::create(['name' => 'Misk']);
        Project::create(['name' => 'TopCon']);
        Project::create(['name' => 'Panasonic']);
    }
}
