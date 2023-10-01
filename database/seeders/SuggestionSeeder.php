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
    public function run()
    {
        // An array of suggestion strings
        $suggestionStrings = [
            'const',
            'await',
            'waitForDisplayed({ timeout: })',
            "setValue('')",
            "client.$('~')",
            "click()"
        ];

        // Iterate over the suggestion strings and create Suggestion model instances
        foreach ($suggestionStrings as $suggestionString) {
            Suggestion::create(['suggestion_text' => $suggestionString]);
        }
    }
    
}
