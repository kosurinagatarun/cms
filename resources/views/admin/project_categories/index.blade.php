@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-semibold mb-6">Project Categories</h2>
            <a href="{{ route('admin.project-categories.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4">
                Create New Category
            </a>
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="border px-4 py-2">{{ $category->name }}</td>
                            <td class="border px-4 py-2">{{ $category->description }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('admin.project-categories.edit', $category) }}"
                                    class="text-blue-500 hover:text-blue-700">Edit</a>
                                <form action="{{ route('admin.project-categories.destroy', $category) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this category?')">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
