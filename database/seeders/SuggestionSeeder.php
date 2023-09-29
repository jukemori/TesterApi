<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Suggestion;

class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        Suggestion::create(['suggestion_text' => 'apple']);
        Suggestion::create(['suggestion_text' => 'banana']);
        Suggestion::create(['suggestion_text' => 'cunt']);
        Suggestion::create(['suggestion_text' => 'donkey']);
    }
}
