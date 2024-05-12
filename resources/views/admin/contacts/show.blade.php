@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-semibold mb-4">Contact Details</h2>
        <div class="border p-4">
            <p><strong>Name:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p><strong>Subject:</strong> {{ $contact->subject }}</p>
            <p><strong>Message:</strong> {{ $contact->message }}</p>
            <p><strong>Status:</strong> {{ $contact->status }}</p>
            <!-- Add more fields as needed -->
            <div class="mt-4">
                <a href="{{ route('admin.contacts.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Contacts
                </a>
            </div>
        </div>
    </div>
@endsection
