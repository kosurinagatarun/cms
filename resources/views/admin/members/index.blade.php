{{-- resources/views/admin/members/index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Members</h2>
            <a href="{{ route('admin.members.create') }}"
                class="px-6 py-2 leading-5 bg-green-500 text-white rounded hover:bg-green-600 transition-colors duration-200 transform">
                Add Member
            </a>
        </div>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Photo</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Designation</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($members as $member)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Image thumbnail -->
                                    <div class="relative w-20 h-12 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded"
                                            src="{{ $member->photo ? asset('' . $member->photo) : asset('images/default.jpg') }}"
                                            alt="{{ $member->name }}" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3">{{ $member->name }}</td>
                            <td class="px-4 py-3">{{ $member->designation->title }}</td>
                            <td class="px-4 py-3">{{ $member->email }}</td>
                            <td class="px-4 py-3">{{ $member->phone }}</td>
                            <td class="px-4 py-3">{{ ucfirst($member->status) }}</td>
                            <td class="px-4 py-3">
                                <div class="flex space-x-3">
                                    <a href="{{ route('admin.members.show', $member) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.members.edit', $member) }}"
                                        class="text-green-500 hover:text-green-700">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.members.destroy', $member) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
