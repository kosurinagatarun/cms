<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'client_name' => 'required|max:255',
            'status' => 'required',
            'location' => 'nullable|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'category_id' => 'required|exists:project_categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|unique:projects,slug',
        ]);

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('uploads', 'public');
            $validatedData['featured_image'] = $imagePath;
        }

        Project::create($validatedData);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'client_name' => 'required|max:255',
            'status' => 'required',
            'location' => 'nullable|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'category_id' => 'required|exists:project_categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|unique:projects,slug,' . $project->id,
        ]);

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('uploads', 'public');
            $validatedData['featured_image'] = $imagePath;
        }

        $project->update($validatedData);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }
}
