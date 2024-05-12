{{-- resources/views/admin/blog_posts/show.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex flex-wrap md:flex-nowrap justify-between items-start mb-8">
            <div class="w-full md:w-2/3">
                <h2
                    class="text-3xl font-semibold mb-4 px-8 py-6 bg-gradient-to-r from-yellow-700 to-yellow-500 shadow-lg rounded-lg text-white">
                    {{ $blogPost->title }}
                </h2>
                <div class="prose max-w-none">
                    {!! $blogPost->content !!}
                </div>
                <div class="flex items-center mt-6">
                    <p class="text-gray-600 mr-4">
                        Date: {{ $blogPost->created_at->format('M d, Y') }}
                    </p>
                    <p class="text-gray-600 mr-4">
                        Time: {{ $blogPost->created_at->format('H:i:s') }}
                    </p>
                    <p class="text-gray-600">
                        Status: {{ ucfirst($blogPost->status) }}
                    </p>
                </div>
                <div class="mt-6">
                    <h3 class="text-xl font-semibold">Meta Title</h3>
                    <p class="text-gray-600">{{ $blogPost->meta_title ?? 'No meta title available' }}</p>
                </div>
                <div class="mt-6">
                    <h3 class="text-xl font-semibold">Meta Description</h3>
                    <p class="text-gray-600">{{ $blogPost->meta_description ?? 'No meta description available' }}</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 md:pl-6 mt-6 md:mt-0">
                @if ($blogPost->featured_image)
                    <img src="{{ asset('storage/' . $blogPost->featured_image) }}" alt="Featured Image"
                        class="rounded shadow-md mb-6">
                @else
                    <p>No featured image available</p>
                @endif
                <div class="flex space-x-3">
                    <a href="{{ route('admin.blog_posts.edit', $blogPost) }}" class="text-green-500 hover:text-green-700">
                        Edit <i class="fas fa-pen"></i>
                    </a>
                    <form action="{{ route('admin.blog_posts.destroy', $blogPost) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            Delete <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                <h3 class="text-2xl font-semibold mb-6">Meta Tags</h3>
                <div class="flex flex-wrap gap-2 mb-6">
                    @if ($blogPost->meta_tags)
                        @foreach (explode(',', $blogPost->meta_tags) as $tag)
                            <span
                                class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $tag }}</span>
                        @endforeach
                    @else
                        <p>No meta tags available</p>
                    @endif
                </div>

                <h3 class="text-2xl font-semibold mb-6">Tags</h3>
                <div class="flex flex-wrap gap-2 mb-6">
                    @if ($blogPost->tags->isNotEmpty())
                        @foreach ($blogPost->tags as $tag)
                            <span
                                class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $tag->name }}</span>
                        @endforeach
                    @else
                        <p>No tags available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
