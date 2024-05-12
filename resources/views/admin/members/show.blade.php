{{-- resources/views/admin/members/show.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex flex-wrap md:flex-nowrap justify-between items-start mb-8">
            <div class="w-full md:w-2/3">
                <h2
                    class="text-3xl font-semibold mb-4 px-8 py-6 bg-gradient-to-r from-yellow-700 to-yellow-500 shadow-lg rounded-lg text-white">
                    {{ $member->name }}
                </h2>
                <div class="prose max-w-none">
                    <p><strong>Email:</strong> {{ $member->email }}</p>
                    <p><strong>Phone:</strong> {{ $member->phone }}</p>
                    <p><strong>Designation:</strong> {{ $member->designation->title }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($member->status) }}</p>
                    @if ($member->description)
                        <p class="mt-4">{{ $member->description }}</p>
                    @endif
                </div>
            </div>
            <div class="w-full md:w-1/3 md:pl-6 mt-6 md:mt-0">
                @if ($member->photo)
                    <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-40 h-40 rounded-lg">
                @else
                    <span class="text-gray-500 dark:text-gray-400">No photo available</span>
                @endif

                <div class="px-8 py-6  flex justify-between items-center">
                    <a href="{{ route('admin.members.index') }}" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-arrow-left"></i> Back to Members
                    </a>
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.members.edit', $member->id) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this member?');">
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
