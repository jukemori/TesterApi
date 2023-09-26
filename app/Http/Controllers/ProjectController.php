<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function show(Project $project)
    {
        return response()->json($project);
    }

    public function store(Request $request)
    {
        // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Get the authenticated user's ID
    $user_id = auth()->id();

     // Log the user ID and request data for debugging
     \Log::info('User ID: ' . $userId);


    // Create a new project record with the user_id
    $project = Project::create([
        'name' => $request->input('name'),
        'user_id' => $userId,
    ]);

    return response()->json($project, 201);
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return response()->json($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Project deleted']);
    }
}
