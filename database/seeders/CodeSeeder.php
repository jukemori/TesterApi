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

        // Define an array of reliable code snippets.
        $reliableCodeSnippets = [
            'const UsernameTextInput = await client.$(\'~userName\');',
            'await UsernameTextInput.waitForDisplayed({ timeout: 30000 });',
            'await UsernameTextInput.setValue(\'ngan.ttt1@sutrixsolutions.com\');',
            'const PasswordTextInput = await client.$(\'~password\');',
            'await PasswordTextInput.setValue(\'123456789\');',
            'const registerButton = await client.$("~loginSubmit");',
            'await registerButton.click();',
            'let errorModal = await client.$("~errorModalText");',
            'await errorModal.waitForDisplayed({ timeout: 20000 });',
            'const modalButton = await client.$("~errorModalButton");',
            'await modalButton.click();',
            
            // Add more reliable code snippets as needed.
        ];

        // Assign reliable code snippets to the first test case.
        $test = $tests->first();
        foreach ($reliableCodeSnippets as $reliableCodeSnippet) {
            Code::create([
                'test_id' => $test->id,
                'suggestion_id' => null, // You can set suggestion_id to null or a valid value if needed
                'code_body' => $reliableCodeSnippet,
            ]);
        }

        // Generate random code snippets for the other test cases.
        for ($i = 1; $i < count($tests); $i++) {
            $test = $tests[$i];
            for ($j = 0; $j < 10; $j++) {
                // Generate your random code here for other test cases.
                $randomCode = '/* Random code snippet for test ' . $test->id . ', snippet ' . ($j + 1) . ' */';
                Code::create([
                    'test_id' => $test->id,
                    'suggestion_id' => null, // You can set suggestion_id to null or a valid value if needed
                    'code_body' => $randomCode,
                ]);
            }
        }
    }



}
