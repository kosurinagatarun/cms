@extends('layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold mb-3">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Category</a>
        <div class="mt-4 overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Category Name</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $category->name }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.categories.show', $category->id) }}"
                                    class="font-medium text-blue-600 hover:underline pr-2"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="font-medium text-green-600 hover:underline pr-2"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline"
                                        onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
