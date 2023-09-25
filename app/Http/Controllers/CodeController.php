<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Code;

class CodeController extends Controller
{
    public function index()
    {
        $codes = Code::all();
        return response()->json($codes);
    }

    public function show(Code $code)
    {
        return response()->json($code);
    }

    public function store(Request $request)
    {
        $code = Code::create($request->all());
        return response()->json($code, 201);
    }

    public function update(Request $request, Code $code)
    {
        $code->update($request->all());
        return response()->json($code);
    }

    public function destroy(Code $code)
    {
        $code->delete();
        return response()->json(['message' => 'Code deleted']);
    }
}
