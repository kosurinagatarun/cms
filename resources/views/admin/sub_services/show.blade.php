@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Updated gradient colors to gold tones -->
            <div class="px-8 py-6 bg-gradient-to-r from-yellow-700 to-yellow-500">
                <h2 class="text-3xl font-semibold text-white">{{ $subService->title }}</h2>
            </div>
            <div class="px-8 py-6">
                @if ($subService->featured_image)
                    <!-- Made image more flexible in display and less restrictive in height -->
                    <img src="{{ Storage::url($subService->featured_image) }}" alt="Sub-Service Image"
                        class="rounded shadow-md mb-6 w-full object-contain max-h-96">
                @endif
                <div class="prose max-w-none">
                    {!! $subService->description !!}
                </div>
            </div>
            <div class="px-8 py-6 bg-gray-100 flex justify-between items-center">
                <a href="{{ route('admin.services.sub_services.index', ['service' => $service->id]) }}"
                    class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left"></i> Back to Sub-Services
                </a>
                <div class="flex space-x-4">
                    <a href="{{ route('admin.services.sub_services.edit', ['service' => $service->id, 'sub_service' => $subService->id]) }}"
                        class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form
                        action="{{ route('admin.services.sub_services.destroy', ['service' => $service->id, 'sub_service' => $subService->id]) }}"
                        method="POST" onsubmit="return confirm('Are you sure you want to delete this sub-service?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-600 hover:text-red-800 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
