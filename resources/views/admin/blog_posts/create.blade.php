@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-semibold mb-6">Create Blog Post</h2>
            <form action="{{ route('admin.blog_posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" name="title" id="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                    <textarea name="content" id="content"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        required></textarea>
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

                <div class="mb-4">
                    <label for="meta_title" class="block text-gray-700 text-sm font-bold mb-2">Meta Title:</label>
                    <input type="text" name="meta_title" id="meta_title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="meta_description" class="block text-gray-700 text-sm font-bold mb-2">Meta
                        Description:</label>
                    <textarea name="meta_description" id="meta_description"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>

                <div class="mb-4">
                    <label for="meta_tags" class="block text-gray-700 text-sm font-bold mb-2">Meta Tags:</label>
                    <input type="text" name="meta_tags" id="meta_tags"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter meta tags separated by commas">
                    <div id="meta-tags-preview" class="mt-2"></div>
                </div>

                <div class="mb-4">
                    <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">Tags:</label>
                    <select name="tags[]" id="tags" multiple
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select name="status" id="status"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug:</label>
                    <input type="text" name="slug" id="slug"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        readonly>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create Blog Post
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('admin.blog_posts.tinymce-config')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');

            titleInput.addEventListener('input', function() {
                const title = this.value.toLowerCase()
                    .replace(/[\s]+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-');
                slugInput.value = title;
            });

            const metaTagsInput = document.getElementById('meta_tags');
            const metaTagsPreview = document.getElementById('meta-tags-preview');

            metaTagsInput.addEventListener('input', function() {
                const tags = this.value.split(',');
                metaTagsPreview.innerHTML = ''; // Clear current tags
                tags.forEach(function(tag) {
                    if (tag.trim() !== '') {
                        const span = document.createElement('span');
                        span.textContent = tag.trim();
                        span.className =
                            'px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800';
                        metaTagsPreview.appendChild(span);
                    }
                });
            });

            const tagsSelect = document.getElementById('tags');
            const tagsPreview = document.getElementById('tags-preview');

            tagsSelect.addEventListener('change', function() {
                tagsPreview.innerHTML = ''; // Clear current tags
                const selectedTags = Array.from(this.selectedOptions).map(option => option.text);
                selectedTags.forEach(function(tag) {
                    const span = document.createElement('span');
                    span.textContent = tag;
                    span.className =
                        'px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 mr-2';
                    tagsPreview.appendChild(span);
                });
            });
        });
    </script>
@endsection
