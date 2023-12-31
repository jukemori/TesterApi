<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suggestion;

class SuggestionController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query'); // Get the query parameter from the request

        // Query the suggestions table to filter by suggestion_text
        $suggestions = Suggestion::where('suggestion_text', 'like', $query . '%')->get();

        return response()->json($suggestions);
    }

    public function show(Suggestion $suggestion)
    {
        return response()->json($suggestion);
    }

    public function store(Request $request)
    {
        $suggestion = Suggestion::create($request->all());
        return response()->json($suggestion, 201);
    }

    public function update(Request $request, Suggestion $suggestion)
    {
        $suggestion->update($request->all());
        return response()->json($suggestion);
    }

    public function destroy(Suggestion $suggestion)
    {
        $suggestion->delete();
        return response()->json(['message' => 'Suggestion deleted']);
    }
}
