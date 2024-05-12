{{-- resources/views/admin/sub_services/index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Sub Services List for <span
                    class="px-1 py-1 bg-gradient-to-r from-yellow-700 to-yellow-500 font-semibold text-white shadow-lg rounded-lg">
                    {{ $service->title }}</span></h1>
            <a href="{{ route('admin.services.sub_services.create', $service->id) }}"
                class="px-1 py-1 bg-gradient-to-r from-yellow-700 to-yellow-500 font-semibold text-white shadow-lg rounded-lg">
                Add New SubService
            </a>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($subServices as $subService)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $subService->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                @if ($subService->featured_image)
                                    <img src="{{ Storage::url($subService->featured_image) }}" alt="Featured Image"
                                        class="w-20 h-20 object-cover rounded-md">
                                @else
                                    No Image
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span
                                    class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full
                                    {{ $subService->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $subService->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.services.sub_services.show', ['service' => $service->id, 'sub_service' => $subService->id]) }}"
                                    class="text-indigo-600 hover:text-indigo-900 mr-4">View</a>
                                <a href="{{ route('admin.services.sub_services.edit', ['service' => $service->id, 'sub_service' => $subService->id]) }}"
                                    class="text-green-500 hover:text-green-700 mr-4">Edit</a>
                                <form
                                    action="{{ route('admin.services.sub_services.destroy', ['service' => $service->id, 'sub_service' => $subService->id]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this sub-service?');"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i> Delete
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
