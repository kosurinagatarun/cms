@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-4">Edit Project Category</h2>
        <form action="{{ route('admin.project-categories.update', $project_category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" name="name" id="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('name', $project_category->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea name="description" id="description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    required>{{ old('description', $project_category->description) }}</textarea>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Project Category
                </button>
            </div>
        </form>
    </div>
@endsection
