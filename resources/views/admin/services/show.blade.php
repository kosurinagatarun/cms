{{-- resources/views/admin/services/show.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex flex-wrap md:flex-nowrap justify-between items-start mb-8">
            <div class="w-full md:w-2/3">
                <h2
                    class="text-3xl font-semibold mb-4 px-8 py-6 bg-gradient-to-r from-yellow-700 to-yellow-500 shadow-lg rounded-lg text-white">
                    {{ $service->title }}
                </h2>
                <div class="prose max-w-none">
                    {!! $service->description !!}
                </div>
            </div>
            <div class="w-full md:w-1/3 md:pl-6 mt-6 md:mt-0">
                <img src="{{ Storage::url($service->featured_image) }}" alt="Featured Image" class="rounded shadow-md mb-6">
                <div class="flex space-x-3">
                    <a href="{{ route('admin.services.edit', $service) }}" class="text-green-500 hover:text-green-700">
                        Edit <i class="fas fa-pen"></i>
                    </a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            Delete <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <h3 class="text-2xl font-semibold mb-6">Sub-Services</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($service->subServices->where('status', 'active') as $subService)
                <div class="bg-white p-4 rounded-lg shadow">
                    @include('partials.sub_service_card', ['subService' => $subService])
                </div>
            @endforeach
        </div>

        <h3 class="text-2xl font-semibold mb-6 mt-10">Inactive Sub-Services</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($service->subServices->where('status', 'inactive') as $subService)
                <div class="bg-white p-4 rounded-lg shadow">
                    @include('partials.sub_service_card', ['subService' => $subService])
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.services.sub_services.create', ['service' => $service->id]) }}"
                class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">
                Add New Sub Service
            </a>
            <a href="{{ route('admin.services.sub_services.index', ['service' => $service->id]) }}"
                class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">
                View All Sub Services
            </a>
        </div>
    </div>
@endsection
