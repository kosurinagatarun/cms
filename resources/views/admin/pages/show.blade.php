{{-- resources/views/admin/pages/show.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex flex-wrap md:flex-nowrap justify-between items-start mb-8">
            <div class="w-full md:w-2/3">
                <h2
                    class="text-3xl font-semibold mb-4 px-8 py-6 bg-gradient-to-r from-yellow-700 to-yellow-500 shadow-lg rounded-lg text-white">
                    {{ $page->title }}
                </h2>
                <div class="prose max-w-none">
                    {!! $page->content !!}
                </div>
            </div>
            <div class="w-full md:w-1/3 md:pl-6 mt-6 md:mt-0">
                @if ($page->featured_image)
                    <img src="{{ Storage::url($page->featured_image) }}" alt="Featured Image" class="rounded shadow-md mb-6">
                @else
                    <p class="text-gray-500 text-sm">No featured image available.</p>
                @endif
                <div class="px-8 py-6  flex justify-between items-center">
                    <a href="{{ route('admin.pages.index') }}" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-arrow-left"></i> Back to Pages
                    </a>
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this page?');">
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
    </div>
@endsection
