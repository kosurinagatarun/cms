@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <!-- Main Content -->
        <div class="flex-1 p-10">
            <div class="mb-4 text-2xl font-bold">Welcome back, {{ auth()->user()->name }}</div>

            <!-- Metrics -->
            <div class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Total Users Widget -->
                    <div class="bg-white shadow rounded p-5">
                        <p class="text-sm font-medium text-gray-400">Total Users</p>
                        <p class="text-3xl">{{ $totalUsers }}</p>
                    </div>
                    <!-- Admins Widget -->
                    <div class="bg-white shadow rounded p-5">
                        <p class="text-sm font-medium text-gray-400">Total Admins</p>
                        <p class="text-3xl">{{ $adminCount }}</p>
                    </div>
                    <!-- Editors Widget -->
                    <div class="bg-white shadow rounded p-5">
                        <p class="text-sm font-medium text-gray-400">Total Editors</p>
                        <p class="text-3xl">{{ $editorCount }}</p>
                    </div>
                </div>
            </div>

            <!-- User Table -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold border-b pb-2">User Details</h3>
                <table class="min-w-full leading-normal mt-6">
                    <thead>
                        <tr>
                            <th
                                class="border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Role
                            </th>
                            <th
                                class="border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Email
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\User::all() as $user)
                            <tr>
                                <td class="border-b border-gray-200 px-4 py-2 text-sm text-gray-700">
                                    {{ $user->name }}
                                </td>
                                <td class="border-b border-gray-200 px-4 py-2 text-sm text-gray-700">
                                    {{ ucfirst($user->role) }}
                                </td>
                                <td class="border-b border-gray-200 px-4 py-2 text-sm text-gray-700">
                                    {{ $user->email }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
