{{-- resources/views/admin/pages/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-semibold mb-6">Edit Page</h2>
            <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug:</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $page->slug) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        readonly>
                </div>

                <div class="mb-4">
                    <label for="meta_title" class="block text-gray-700 text-sm font-bold mb-2">Meta Title:</label>
                    <input type="text" name="meta_title" id="meta_title"
                        value="{{ old('meta_title', $page->meta_title) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="meta_description" class="block text-gray-700 text-sm font-bold mb-2">Meta
                        Description:</label>
                    <textarea name="meta_description" id="meta_description"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('meta_description', $page->meta_description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                    <textarea name="content" id="content"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        required>{{ old('content', $page->content) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="featured_image" class="block text-gray-700 text-sm font-bold mb-2">Featured Image:</label>
                    <input type="file" name="featured_image" id="featured_image"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if ($page->featured_image)
                        <div class="mt-4">
                            <img src="{{ Storage::url($page->featured_image) }}" alt="Featured Image" class="w-48 h-auto">
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select name="status" id="status"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="draft" {{ $page->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ $page->status == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ $page->status == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="meta_keywords" class="block text-gray-700 text-sm font-bold mb-2">Meta Keywords:</label>
                    <input type="text" name="meta_keywords" id="meta_keywords" value="{{ is_array($page->meta_keywords) ? implode(', ', $page->meta_keywords) : $page->meta_keywords }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter keywords, separated by commas">
                    <div id="keyword-tags" class="mt-2"></div>
                </div>


                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Page
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('admin.pages.tinymce-config')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateSlug() {
                const title = document.getElementById('title').value;
                document.getElementById('slug').value = title.toLowerCase()
                    .replace(/[\s]+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-');
            }

            const metaKeywordsInput = document.getElementById('meta_keywords');
            const keywordTags = document.getElementById('keyword-tags');

            function updateKeywords() {
                const keywords = metaKeywordsInput.value.split(',');
                keywordTags.innerHTML = ''; // Clear current tags
                keywords.forEach(function(keyword) {
                    if (keyword.trim() !== '') {
                        const span = document.createElement('span');
                        span.textContent = keyword.trim();
                        span.className =
                            'px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800';
                        keywordTags.appendChild(span);
                    }
                });
            }

            document.getElementById('title').addEventListener('input', updateSlug);
            metaKeywordsInput.addEventListener('input', updateKeywords);
            updateKeywords(); // Call on initial load to display existing keywords as tags
        });
    </script>
@endsection
