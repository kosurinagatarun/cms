@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-4">Tag Details</h1>

        <div class="mb-4">
            <p class="text-gray-700 text-sm font-bold mb-2">Tag Name:</p>
            <p class="text-gray-900">{{ $tag->name }}</p>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('admin.tags.index') }}"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Back to Tags
            </a>
        </div>
    </div>
@endsection
