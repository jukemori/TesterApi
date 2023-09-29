<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Code;

class CodeController extends Controller
{
    private function logRequestInfo(Request $request)
    {
        \Log::info("Received projectId: " . $request->route('projectId'));
        \Log::info("Received testId: " . $request->route('testId'));
    }

    private function getTestID(Request $request)
    {
        return $request->route('testId');
    }

    public function index(Request $request, $projectId, $testId)
    {
        $this->logRequestInfo($request);

        $codes = Code::where('test_id', $this->getTestID($request))->get();
        \Log::info("Fetched codes:", $codes->toArray());

        return response()->json($codes);
    }

    public function show(Code $code)
    {
        return response()->json($code);
    }

    public function store(Request $request, $projectId, $testId)
    {
        $request->validate([
            'code_body' => 'required|string|max:255',
        ]);
       
        $code = Code::create([
            'code_body' => $request->input('code_body'),
            'test_id' => $this->getTestID($request),
        ]);
        return response()->json($code, 201);
    }

    public function update(Request $request, $projectId, $testId, $codeId)
    {
        $code = Code::where('test_id', $testId)->find($codeId);

        if (!$code) {
            return response()->json(['error' => 'Code not found'], 404);
        }

        // Update the code attributes based on your requirements
        $code->update($request->all());

        return response()->json(['message' => 'Code updated']);
    }


    public function destroy(Request $request, $projectId, $testId, $codeId)
    {
        try {
            $code = Code::where('test_id', $this->getTestID($request))->find($codeId);

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
