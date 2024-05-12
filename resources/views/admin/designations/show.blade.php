@extends('layouts.admin')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Designation Details</h1>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Designation Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Details about the designation.</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Title</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $designation->title }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Department</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $designation->department }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Description</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $designation->description }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ ucfirst($designation->status) }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <a href="{{ route('admin.designations.index') }}" class="text-blue-500 mt-4">Back to Designations</a>
    </div>
@endsection
