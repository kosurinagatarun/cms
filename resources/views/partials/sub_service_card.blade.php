{{-- resources/views/partials/sub_service_card.blade.php --}}
<div class="bg-white p-4 rounded-lg shadow">
    @if ($subService->featured_image)
        <img src="{{ Storage::url($subService->featured_image) }}" alt="Sub-Service Image"
            class="rounded-md mb-4 w-full h-32 object-cover">
    @endif
    <div class="bg-gradient-to-r from-yellow-700 to-yellow-500 shadow-lg rounded-lg">
        <h4 class="text-l font-medium font-semibold text-white px-3 py-1">
            {{ $subService->title }}
        </h4>
    </div>
    <div class="text-gray-700 mb-4">{!! Str::limit($subService->description, 100) !!}</div>
    <div class="flex space-x-4">
        <a href="{{ route('admin.services.sub_services.show', ['service' => $service->id, 'sub_service' => $subService->id]) }}"
            class="text-green-500 hover:text-green-600">
            <i class="fas fa-eye"></i>
        </a>
        <a href="{{ route('admin.services.sub_services.edit', ['service' => $service->id, 'sub_service' => $subService->id]) }}"
            class="text-blue-500 hover:text-blue-600">
            <i class="fas fa-pen"></i>
        </a>
        <form
            action="{{ route('admin.services.sub_services.destroy', ['service' => $service->id, 'sub_service' => $subService->id]) }}"
            method="POST" onsubmit="return confirm('Are you sure you want to delete this sub-service?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>
</div>
