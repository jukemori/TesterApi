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
        
        $user = User::firstOrCreate([
            'name' => 'testuser',
            'email' => 'test@email.com',
            'password' => Hash::make('123456'),
        ]);

        
        $projects = ['Project 1', 'Project 2', 'Project 3'];

        foreach ($projects as $projectName) {
            Project::create([
                'name' => $projectName,
                'user_id' => $user->id, 
            ]);
        }
    }
}
