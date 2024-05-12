@extends('layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold mb-3">Category Details</h1>
        <div class="bg-white p-6 rounded shadow">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <p class="text-gray-600">{{ $category->name }}</p>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('admin.categories.edit', $category->id) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit
                    Category</a>
                <a href="{{ route('admin.categories.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back
                    to Index</a>
            </div>
        </div>
    </div>
@endsection
