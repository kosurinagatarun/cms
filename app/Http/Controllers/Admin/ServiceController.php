<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string'  // Validate the status input
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->description = $request->description;
        $service->status = $request->status;  // Set the status

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $service->featured_image = $imagePath;
        }

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string'  // Validate the status input
        ]);

        $service->title = $request->title;
        $service->slug = Str::slug($request->title); // Consider keeping the slug static unless a change is necessary
        $service->description = $request->description;
        $service->status = $request->status;  // Update the status

        if ($request->hasFile('image')) {
            if ($service->featured_image) {
                Storage::disk('public')->delete($service->featured_image);
            }
            $imagePath = $request->file('image')->store('services', 'public');
            $service->featured_image = $imagePath;
        }

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function show($id)
    {
        $service = Service::with('subServices')->findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        if ($service->featured_image) {
            Storage::disk('public')->delete($service->featured_image);
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
