{{-- resources/views/admin/sub_services/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-900 mb-4">Edit SubService</h1>
            <form
                action="{{ route('admin.services.sub_services.update', ['service' => $service->id, 'sub_service' => $subService->id]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $subService->title }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required oninput="generateSlug()">
                </div>

                <div class="mb-4">
                    <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug:</label>
                    <input type="text" name="slug" id="slug" value="{{ $subService->slug }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea name="description" id="description"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        required>{{ $subService->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                    <input type="file" name="image" id="image"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if ($subService->featured_image)
                        <img src="{{ Storage::url($subService->featured_image) }}" alt="Featured Image"
                            class="w-48 h-auto mt-4">
                    @endif
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select name="status" id="status"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="active" {{ $subService->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $subService->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update SubService
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script
        src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY', 'oar18yrabgr1ca4cfieet5ferz7mdkwhshebzhqixjn1ztio') }}/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'link image code',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code',
            height: 300
        });

        function generateSlug() {
            var title = document.getElementById('title').value.trim();
            var slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
            document.getElementById('slug').value = slug; // Update the slug as title changes
        }
    </script>
@endsection
