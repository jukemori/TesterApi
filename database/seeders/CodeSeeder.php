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
        //
        
        $test1 = Test::find(1);
        $test2 = Test::find(2);
        $test3 = Test::find(3);

        Code::create([
            'test_id' => $test1->id,
            'suggestion_id' => 1, 
            'code_body' => 'Sample code for Test 1',
        ]);

        Code::create([
            'test_id' => $test2->id,
            'suggestion_id' => 2, 
            'code_body' => 'Sample code for Test 2',
        ]);

        Code::create([
            'test_id' => $test3->id,
            'suggestion_id' => null, 
            'code_body' => 'Sample code for Test 3',
        ]);
    }
}
