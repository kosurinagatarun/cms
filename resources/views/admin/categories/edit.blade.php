@extends('layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold mb-3">Edit Category</h1>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Category Name:</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                <a href="{{ route('admin.categories.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back
                    to Index</a>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.categories.show', $category->id) }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Show
                    Category</a>
            </div>
        </form>
    </div>
@endsection
