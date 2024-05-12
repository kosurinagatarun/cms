@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-4">Tags</h1>

        <!-- Actions -->
        <div class="mb-4">
            <a href="{{ route('admin.tags.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Create New Tag</a>
        </div>

        <!-- Tags listing -->
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($tags as $tag)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">{{ $tag->name }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.tags.show', $tag->id) }}"
                                    class="text-blue-500 hover:text-blue-700">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.tags.edit', $tag->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this tag?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
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
