{{-- resources/views/admin/contacts/index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Contacts</h2>
            {{-- <a href="{{ route('admin.contacts.create') }}"
                class="px-6 py-2 leading-5 bg-green-500 text-white rounded hover:bg-green-600 transition-colors duration-200 transform">
                Add Contact
            </a> --}}
        </div>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse ($contacts as $contact)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">{{ $contact->name }}</td>
                            <td class="px-4 py-3">{{ $contact->email }}</td>
                            <td class="px-4 py-3">{{ $contact->phone }}</td>
                            <td class="px-4 py-3">
                                <div class="flex space-x-3">
                                    <a href="{{ route('admin.contacts.show', $contact) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
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
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center">No contacts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
