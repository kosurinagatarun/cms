<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::all();
        return view('admin.project_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.project_categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:project_categories|max:255',
            'description' => 'nullable',
        ]);

        ProjectCategory::create($validatedData);

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category created successfully!');
    }

    public function edit(ProjectCategory $project_category)
    {
        return view('admin.project_categories.edit', compact('project_category'));
    }



    public function update(Request $request, ProjectCategory $project_category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:project_categories,name,' . $project_category->id,
            'description' => 'nullable',
        ]);

        $project_category->update($validatedData);

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category updated successfully!');
    }



    public function destroy(ProjectCategory $category)
    {
        $category->delete();

        return redirect()->route('admin.project_categories.index')
            ->with('success', 'Project category deleted successfully!');
    }
}
