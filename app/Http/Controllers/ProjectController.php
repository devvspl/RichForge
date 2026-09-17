<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects()->with(['domains', 'apiKeys'])->latest()->get();

        return view('dashboard.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('dashboard.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project = Auth::user()->projects()->create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('projects.show', $project->id)->with('success', 'Project created successfully!');
    }

    public function show(int $id)
    {
        $project = Auth::user()->projects()->with(['configuration', 'apiKeys', 'domains', 'media'])->findOrFail($id);

        return view('dashboard.projects.show', compact('project'));
    }

    public function updateConfig(Request $request, int $id)
    {
        $project = Auth::user()->projects()->findOrFail($id);

        $validated = $request->validate([
            'height' => 'required|integer|min:150|max:1000',
            'placeholder' => 'nullable|string',
            'theme' => 'required|string',
            'upload_enabled' => 'boolean',
            'max_file_size_mb' => 'required|integer|min:1|max:100',
            'dark_mode' => 'boolean',
        ]);

        $project->configuration()->updateOrCreate(
            ['project_id' => $project->id],
            [
                'height' => $validated['height'],
                'placeholder' => $validated['placeholder'] ?? '',
                'theme' => $validated['theme'],
                'upload_enabled' => $request->has('upload_enabled'),
                'max_file_size_mb' => $validated['max_file_size_mb'],
                'dark_mode' => $request->has('dark_mode'),
            ]
        );

        return back()->with('success', 'Editor configuration updated successfully!');
    }

    public function destroy(int $id)
    {
        $project = Auth::user()->projects()->findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
