@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-50">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-700">
            <span class="font-bold text-lg">DTO-TOOLS</span>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
                <x-heroicon-o-home class="w-5 h-5"/> Home
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
                <x-heroicon-o-user-group class="w-5 h-5"/> User Approvals
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
                <x-heroicon-o-cog-6-tooth class="w-5 h-5"/> Config Editors
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
                <x-heroicon-o-document-text class="w-5 h-5"/> Reports
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
                <x-heroicon-o-arrow-left-on-rectangle class="w-5 h-5"/> Logout
            </a>
        </nav>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Topbar -->
        <header class="flex justify-between items-center px-6 py-4 bg-white border-b">
            <div class="flex items-center w-1/3">
                <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-500 mr-2"/>
                <input type="text" placeholder="Search pages, editors..."
                    class="w-full border border-gray-200 rounded-md px-3 py-1.5 focus:ring focus:ring-indigo-200 focus:border-indigo-400">
            </div>
            <div class="flex items-center gap-5">
                <button class="relative">
                    <x-heroicon-o-bell class="w-6 h-6 text-gray-600"/>
                    <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div class="flex items-center gap-2">
                    <img src="https://i.pravatar.cc/40" alt="profile" class="w-8 h-8 rounded-full">
                    <span class="text-sm text-gray-700">Admin</span>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="p-6 flex-1 overflow-y-auto">
            <h1 class="text-2xl font-bold mb-4">My Bookings</h1>

            <!-- Chart placeholder -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-lg font-semibold mb-2">Period Overview</h2>
                <div class="h-40 flex items-center justify-center text-gray-400">
                    [Chart placeholder]
                </div>
            </div>

            <!-- Arriving today -->
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold mb-3">Arriving today</h2>
                    <ul class="space-y-3 text-sm">
                        <li class="flex justify-between">
                            <span>Valencia apartment</span>
                            <span class="text-green-600">Approved</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Night swimming pool</span>
                            <span class="text-yellow-600">Pending</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Unique & Cozy studio</span>
                            <span class="text-green-600">Approved</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold mb-3">Low occupancy?</h2>
                    <p class="text-gray-600 text-sm mb-3">Create a last minute promotion to maximize</p>
                    <button class="bg-indigo-500 text-white px-4 py-2 rounded-md">Create</button>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
