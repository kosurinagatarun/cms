@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-semibold mb-6">Project Details</h2>
            <div class="mb-4">
                <p class="font-bold">Title:</p>
                <p>{{ $project->title }}</p>
            </div>

            <div class="mb-4">
                <p class="font-bold">Slug:</p>
                <p>{{ $project->slug }}</p>
            </div>

            <div class="mb-4">
                <p class="font-bold">Description:</p>
                <div>{!! $project->description !!}</div>
            </div>

            <div class="mb-4">
                <p class="font-bold">Client Name:</p>
                <p>{{ $project->client_name }}</p>
            </div>

            <div class="mb-4">
                <p class="font-bold">Duration:</p>
                <p>{{ $project->duration }}</p>
            </div>

            <div class="mb-4">
                <p class="font-bold">Status:</p>
                <p>{{ ucfirst($project->status) }}</p>
            </div>

            <div class="mb-4">
                <p class="font-bold">Location:</p>
                <p>{{ $project->location }}</p>
            </div>

            <div class="mb-4">
                <p class="font-bold">Start Date:</p>
                <p>{{ $project->start_date }}</p>
            </div>

            <div class="mb-4">
                <p class="font-bold">End Date:</p>
                <p>{{ $project->end_date }}</p>
            </div>

            <div class="mb-4">
                <p class="font-bold">Featured Image:</p>
                @if ($project->featured_image)
                    <img src="{{ asset('storage/' . $project->featured_image) }}" alt="Featured Image">
                @else
                    <p>No featured image available</p>
                @endif
            </div>

            <div class="mb-4">
                <p class="font-bold">Category:</p>
                <p>{{ $project->category->name }}</p>
            </div>

            <!-- Add any other fields here -->

            <div class="mt-6">
                <a href="{{ route('admin.projects.edit', $project->id) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Edit Project
                </a>
            </div>
        </div>
    </div>
@endsection
