@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-4">Create Tag</h1>

        <form action="{{ route('admin.tags.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Tag Name:</label>
                <input type="text" name="name" id="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Tag
                </button>
                <a href="{{ route('admin.tags.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
