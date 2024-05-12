@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-4">Tag Details</h1>

        <div class="mb-4">
            <p><span class="font-semibold">ID:</span> {{ $tag->id }}</p>
            <p><span class="font-semibold">Name:</span> {{ $tag->name }}</p>
        </div>

        <div>
            <a href="{{ route('admin.tags.edit', $tag->id) }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Edit</a>
            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">Delete</button>
            </form>
        </div>
    </div>
@endsection
