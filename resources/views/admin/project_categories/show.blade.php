@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-semibold mb-6">Project Category Details</h2>
            <div class="mb-4">
                <strong>Name:</strong> {{ $category->name }}
            </div>
            <div class="mb-4">
                <strong>Created At:</strong> {{ $category->created_at->format('M d, Y') }}
            </div>
            <div class="mb-4">
                <strong>Updated At:</strong> {{ $category->updated_at->format('M d, Y') }}
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('admin.project-categories.edit', $category) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Edit Category
                </a>
                <form action="{{ route('admin.project-categories.destroy', $category) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this category?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Delete Category
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
