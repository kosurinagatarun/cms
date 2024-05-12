{{-- resources/views/admin/services/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-semibold mb-6">Edit Service</h2>
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $service->title }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea name="description" id="description"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        required>{{ $service->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                    <input type="file" name="image" id="image"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if ($service->featured_image)
                        <div class="mt-4">
                            <img src="{{ Storage::url($service->featured_image) }}" alt="Featured Image"
                                class="w-48 h-auto">
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select name="status" id="status"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Service
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/oar18yrabgr1ca4cfieet5ferz7mdkwhshebzhqixjn1ztio/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table directionality emoticons template paste textpattern',
            toolbar: 'code | undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            toolbar_mode: 'floating',
            height: 300,
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
    </script>
@endsection
