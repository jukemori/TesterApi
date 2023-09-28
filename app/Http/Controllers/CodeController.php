<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Code;

class CodeController extends Controller
{
    public function index(Request $request, $testId)
    {
        \Log::info("Received testId: $testId");

        $codes = Code::where('test_id', $testId)->get();
        return response()->json($codes);
    }

    public function show(Code $code)
    {
        return response()->json($code);
    }


    public function store(Request $request, $testId)
    {
        $request->validate([
            'code_body' => 'required|string|max:255',
        ]);
       
        $code = Code::create([
            'code_body' => $request->input('code_body'),
            'test_id' => $testId,
        ]);
        return response()->json($code, 201);
    }

    public function update(Request $request, Code $code)
    {
        $code->update($request->all());
        return response()->json($code);
    }

    // public function destroy($testId, $codeId)
    // {
    //     try {
    //         $code = Code::where('test_id', $testId)->findOrFail($codeId);
    //         $code->delete();
    //         return response()->json(['message' => 'code deleted']);
    //     } catch (\Exception $e) {
    //         // Log any exceptions for further investigation
    //         \Log::error('Error deleting code: ' . $e->getMessage());
    //         return response()->json(['error' => 'Error deleting code'], 500);
    //     }
    // }

    public function destroy($testId, $codeId)
    {
        try {
            $code = Code::where('test_id', $testId)->find($codeId);

            if (!$code) {
                return response()->json(['error' => 'Code not found'], 404);
            }

            $code->delete();
            return response()->json(['message' => 'Code deleted']);
        } catch (\Exception $e) {
            // Log any exceptions for further investigation
            \Log::error('Error deleting code: ' . $e->getMessage());
            return response()->json(['error' => 'Error deleting code'], 500);
        }
    }

}
