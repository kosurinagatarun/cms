@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-semibold mb-6">Add New Project</h2>
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" name="title" id="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug:</label>
                    <input type="text" name="slug" id="slug"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea name="description" id="description" class="tinymce-editor">{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="client_name" class="block text-gray-700 text-sm font-bold mb-2">Client Name:</label>
                    <input type="text" name="client_name" id="client_name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                {{-- <div class="mb-4">
                    <label for="duration" class="block text-gray-700 text-sm font-bold mb-2">Duration:</label>
                    <input type="text" name="duration" id="duration"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div> --}}

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select name="status" id="status"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                    <input type="text" name="location" id="location"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
                    <input type="date" name="start_date" id="start_date"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date:</label>
                    <input type="date" name="end_date" id="end_date"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for="featured_image" class="block text-gray-700 text-sm font-bold mb-2">Featured Image:</label>
                    <input type="file" name="featured_image" id="featured_image"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                    <select name="category_id" id="category_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Add any other fields here -->

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create Project
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/oar18yrabgr1ca4cfieet5ferz7mdkwhshebzhqixjn1ztio/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.tinymce-editor',
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

        // Auto-generate slug based on title
        document.getElementById('title').addEventListener('input', function(event) {
            const title = event.target.value;
            const slug = title.toLowerCase().replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-');
            document.getElementById('slug').value = slug;
        });
    </script>
@endsection
