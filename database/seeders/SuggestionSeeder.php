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
        
        Suggestion::create(['suggestion_text' => 'Suggestion 1']);
        Suggestion::create(['suggestion_text' => 'Suggestion 2']);
        Suggestion::create(['suggestion_text' => 'Suggestion 3']);
    }
}
