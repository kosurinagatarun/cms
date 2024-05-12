{{-- resources/views/admin/projects/index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Projects</h2>
            <a href="{{ route('admin.projects.create') }}"
                class="px-6 py-2 leading-5 bg-green-500 text-white rounded hover:bg-green-600 transition-colors duration-200 transform">
                Add Project
            </a>
        </div>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Status</th> <!-- New header for Status -->
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($projects as $project)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Image thumbnail -->
                                    <div class="relative w-20 h-12 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded"
                                            src="{{ Storage::url($project->featured_image) }}" alt=""
                                            loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $project->title }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $project->category->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span
                                    class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $project->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex space-x-3">
                                    <a href="{{ route('admin.projects.show', $project) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}"
                                        class="text-green-500 hover:text-green-700">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
