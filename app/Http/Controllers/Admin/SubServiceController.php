<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;


class SubServiceController extends Controller
{
    /**
     * Display a listing of the sub-services.
     *
     * @param int $serviceId Service ID to filter sub-services
     * @return \Illuminate\View\View
     */
    public function index($serviceId)
    {
        $service = Service::findOrFail($serviceId); // Ensures the service exists and handles errors if not
        $subServices = SubService::where('service_id', $serviceId)->get();
        return view('admin.sub_services.index', compact('subServices', 'service'));
    }

    /**
     * Show the form for creating a new sub-service.
     *
     * @param int $serviceId Service ID to create a sub-service for
     * @return \Illuminate\View\View
     */
    public function create($serviceId)
    {
        // $service = Service::findOrFail($serviceId);
        // $subServices = SubService::where('id', $serviceId)->exists();
        // Optionally confirm service exists without fetching full model
        $exists = Service::where('id', $serviceId)->exists();

        if (!$exists) {
            abort(404); // Or handle the error as appropriate
        }

        // Since the service exists, now fetch the full model to pass to the view
        $service = Service::findOrFail($serviceId); // This will also handle the 404 if the ID is not found

        return view('admin.sub_services.create', compact('service', 'serviceId'));
    }


    /**
     * Store a newly created sub-service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $serviceId Service ID to attach the new sub-service to
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $serviceId)
    {
        \Log::info('Received data:', $request->all());  // Check logs to see the output
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|unique:sub_services',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image if applicable
        ]);

        // Generate a slug from the title
        $slug = Str::slug($request->title);

        // Check if the slug is unique in the sub_services table
        $existingSubService = SubService::where('slug', $slug)->first();
        if ($existingSubService) {
            return back()->withErrors(['slug' => 'The slug must be unique.'])->withInput();
        }

        // Fetch the Service to ensure it exists and associate the new SubService with it
        $service = Service::findOrFail($serviceId);

        // Create and save the new SubService
        $subService = new SubService();
        $subService->service_id = $service->id;
        $subService->title = $request->title;
        $subService->description = $request->description;
        $subService->slug = $request->input('slug');

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sub_services', 'public');
            $subService->featured_image = $imagePath;
        }

        $subService->save();

        // Redirect to the list of SubServices for the current Service with a success message
        return redirect()->route('admin.services.sub_services.index', ['service' => $serviceId])
            ->with('success', 'Sub-service created successfully.');
    }


    /**
     * Display the specified sub-service.
     *
     * @param  \App\Models\SubService  $subService
     * @return \Illuminate\View\View
     */
    public function show(Service $service, SubService $subService)
    {
        // Your code to show the sub-service
        return view('admin.sub_services.show', compact('service', 'subService'));
    }

    /**
     * Show the form for editing the specified sub-service.
     *
     * @param  \App\Models\SubService  $subService
     * @return \Illuminate\View\View
     */
    public function edit(Service $service, SubService $subService)
    {
        // Fetch the associated Service to display or use in the view if necessary
        $service = Service::findOrFail($subService->service_id);

        // Load the edit view and pass the sub-service and service to it
        return view('admin.sub_services.edit', compact('subService', 'service'));
    }


    public function update(Request $request, $serviceId, SubService $subService)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string',  // Validate the status input
        ]);

        // Update the sub-service details
        $subService->title = $request->title;
        $subService->slug = Str::slug($request->title); // Automatically generate slug from title
        $subService->description = $request->description;
        $subService->status = $request->status;  // Update the status

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($subService->featured_image && Storage::disk('public')->exists($subService->featured_image)) {
                Storage::disk('public')->delete($subService->featured_image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('sub_services', 'public');
            $subService->featured_image = $imagePath;
        }

        // Save the updated sub-service
        $subService->save();

        // Redirect to the sub-services index page with a success message
        return redirect()->route('admin.services.sub_services.index', ['service' => $serviceId])
            ->with('success', 'Sub-service updated successfully.');
    }


    // SubServiceController.php
    public function destroy(Service $service, SubService $subService)
    {
        if ($subService->featured_image) {
            Storage::disk('public')->delete($subService->featured_image);
        }
        $subService->delete();
        return redirect()->route('admin.services.sub_services.index', $subService->service_id)->with('success', 'Sub-service deleted successfully');
    }


}
