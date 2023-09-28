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

        foreach ($tests as $test) {
            for ($i = 1; $i <= 3; $i++) {
                Code::create([
                    'test_id' => $test->id,
                    'suggestion_id' => null, // You can set suggestion_id to null or a valid value if needed
                    'code_body' => "Code {$i} for Test {$test->id}",
                ]);
            }
        }
    }


}
