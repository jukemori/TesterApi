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

    public function show(Test $test)
    {
        return response()->json($test);
    }

    public function store(Request $request)
    {
        $test = Test::create($request->all());
        return response()->json($test, 201);
    }

    public function update(Request $request, Test $test)
    {
        $test->update($request->all());
        return response()->json($test);
    }

    public function destroy(Test $test)
    {
        $test->delete();
        return response()->json(['message' => 'Test deleted']);
    }
}
