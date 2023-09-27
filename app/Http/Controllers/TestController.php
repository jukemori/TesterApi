<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function index(Request $request, $projectId)
    {
        $tests = Test::where('project_id', $projectId)->get();
        return response()->json($tests);
    }

    public function show($projectId, $testId)
    {
        $test = Test::where('project_id', $projectId)->findOrFail($testId);
        return response()->json($test);
    }

    public function store(Request $request, $projectId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
       
        $test = Test::create([
            'name' => $request->input('name'),
            'project_id' => $projectId,
            'is_successful' => false,
        ]);
        return response()->json($test, 201);
    }

    public function update(Request $request, Test $test)
    {
        $test->update($request->all());
        return response()->json($test);
    }

    public function destroy($projectId, $testId)
    {
        try {
            $test = Test::where('project_id', $projectId)->findOrFail($testId);
            $test->delete();
            return response()->json(['message' => 'Test deleted']);
        } catch (\Exception $e) {
            // Log any exceptions for further investigation
            \Log::error('Error deleting test: ' . $e->getMessage());
            return response()->json(['error' => 'Error deleting test'], 500);
        }
    }
}
