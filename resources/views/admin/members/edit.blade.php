{{-- resources/views/admin/members/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Edit Member</h2>
        <form action="{{ route('admin.members.update', $member) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ $member->name }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="designation_id" class="block text-sm font-medium text-gray-700">Designation</label>
                    <select name="designation_id" id="designation_id"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @foreach ($designations as $designation)
                            <option value="{{ $designation->id }}"
                                {{ $member->designation_id == $designation->id ? 'selected' : '' }}>
                                {{ $designation->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $member->description }}</textarea>
                </div>
                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                    <input type="file" name="photo" id="photo"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="facebook_url" class="block text-sm font-medium text-gray-700">Facebook URL</label>
                    <input type="text" name="facebook_url" id="facebook_url" value="{{ $member->facebook_url }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="twitter_url" class="block text-sm font-medium text-gray-700">Twitter URL</label>
                    <input type="text" name="twitter_url" id="twitter_url" value="{{ $member->twitter_url }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="instagram_url" class="block text-sm font-medium text-gray-700">Instagram URL</label>
                    <input type="text" name="instagram_url" id="instagram_url" value="{{ $member->instagram_url }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="linkedin_url" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                    <input type="text" name="linkedin_url" id="linkedin_url" value="{{ $member->linkedin_url }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ $member->email }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ $member->phone }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <option value="active" {{ $member->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $member->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
