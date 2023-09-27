<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Code;
use App\Models\Test;
use App\Models\Suggestion;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tests = Test::all();
        $suggestions = Suggestion::all();
        $codeBodies = [
            'Sample code 1',
            'Sample code 2',
            'Sample code 3',
            'Sample code 4',
            'Sample code 5',
            'Sample code 6',
        ];

        foreach ($tests as $test) {
            foreach ($codeBodies as $codeBody) {
                Code::create([
                    'test_id' => $test->id,
                    'suggestion_id' => $suggestions->random()->id,
                    'code_body' => $codeBody,
                ]);
            }
        }
    }

}
