{{-- resources/views/admin/members/create.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Add Member</h2>
        <form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Name</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block w-full"
                        value="{{ old('name') }}" required>
                </div>
                <div>
                    <label for="designation_id"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-400">Designation</label>
                    <select name="designation_id" id="designation_id" class="form-select mt-1 block w-full rounded-md"
                        required>
                        <option value="" disabled selected>Select Designation</option>
                        @foreach ($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label for="description"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Description</label>
                <textarea name="description" id="description" class="form-textarea mt-1 block w-full" rows="3">{{ old('description') }}</textarea>
            </div>
            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Photo</label>
                <input type="file" name="photo" id="photo" class="form-input mt-1 block w-full">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="facebook_url" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Facebook
                        URL</label>
                    <input type="url" name="facebook_url" id="facebook_url" class="form-input mt-1 block w-full"
                        value="{{ old('facebook_url') }}">
                </div>
                <div>
                    <label for="twitter_url" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Twitter
                        URL</label>
                    <input type="url" name="twitter_url" id="twitter_url" class="form-input mt-1 block w-full"
                        value="{{ old('twitter_url') }}">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="instagram_url" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Instagram
                        URL</label>
                    <input type="url" name="instagram_url" id="instagram_url" class="form-input mt-1 block w-full"
                        value="{{ old('instagram_url') }}">
                </div>
                <div>
                    <label for="linkedin_url" class="block text-sm font-medium text-gray-700 dark:text-gray-400">LinkedIn
                        URL</label>
                    <input type="url" name="linkedin_url" id="linkedin_url" class="form-input mt-1 block w-full"
                        value="{{ old('linkedin_url') }}">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Email</label>
                    <input type="email" name="email" id="email" class="form-input mt-1 block w-full"
                        value="{{ old('email') }}">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-input mt-1 block w-full"
                        value="{{ old('phone') }}">
                </div>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Status</label>
                <select name="status" id="status" class="form-select mt-1 block w-full rounded-md" required>
                    <option value="" disabled selected>Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="mt-6">
                <button type="submit"
                    class="px-6 py-2 leading-5 bg-green-500 text-white rounded hover:bg-green-600 transition-colors duration-200 transform">Save</button>
            </div>
        </form>
    </div>
@endsection
