<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return view('admin.designations.index', compact('designations'));
    }

    public function create()
    {
        return view('admin.designations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:designations',
            'department' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        Designation::create($request->all());

        return redirect()->route('admin.designations.index')
            ->with('success', 'Designation created successfully.');
    }

    public function edit(Designation $designation)
    {
        return view('admin.designations.edit', compact('designation'));
    }

    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'title' => 'required|unique:designations,title,' . $designation->id,
            'department' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $designation->update($request->all());

        return redirect()->route('admin.designations.index')
            ->with('success', 'Designation updated successfully.');
    }

    public function show(Designation $designation)
    {
        return view('admin.designations.show', compact('designation'));
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();

        return redirect()->route('admin.designations.index')
            ->with('success', 'Designation deleted successfully.');
    }
}
