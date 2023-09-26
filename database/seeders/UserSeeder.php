<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Project;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Find an existing user or create a new one
        $user = User::firstOrCreate([
            'name' => 'testuser',
            'email' => 'test@email.com',
            'password' => Hash::make('123456'),
        ]);

        // Create and associate the projects
        $projects = ['Project A', 'Project B', 'Project C'];

        foreach ($projects as $projectName) {
            Project::create([
                'name' => $projectName,
                'user_id' => $user->id, // Associate the project with the user
            ]);
        }
    }
}
