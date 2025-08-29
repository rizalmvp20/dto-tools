@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-50">
  @include('partials.dash.sidebar')

  <div class="flex-1 flex flex-col">
    @include('partials.dash.topbar')

    <main class="p-6 flex-1 overflow-y-auto">
      <h1 class="text-2xl font-bold mb-4">My Bookings</h1>

      <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div class="flex items-center justify-between mb-2">
          <h2 class="text-lg font-semibold">Period Overview</h2>
          <div class="flex items-center gap-2 text-sm text-slate-500">
            <i class="fa-regular fa-calendar"></i> 01/03 – 14/03
          </div>
        </div>
        <div class="h-40 flex items-center justify-center text-gray-400">
          [Chart placeholder]
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
          <h2 class="text-lg font-semibold mb-3">Arriving today</h2>
          <ul class="space-y-3 text-sm">
            <li class="flex justify-between">
              <span>Valencia apartment</span>
              <span class="text-green-600 flex items-center gap-1"><i class="fa-solid fa-circle-check"></i> Approved</span>
            </li>
            <li class="flex justify-between">
              <span>Night swimming pool</span>
              <span class="text-yellow-600 flex items-center gap-1"><i class="fa-solid fa-clock"></i> Pending</span>
            </li>
            <li class="flex justify-between">
              <span>Unique & Cozy studio</span>
              <span class="text-green-600 flex items-center gap-1"><i class="fa-solid fa-circle-check"></i> Approved</span>
            </li>
          </ul>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
          <h2 class="text-lg font-semibold mb-3">Low occupancy?</h2>
          <p class="text-gray-600 text-sm mb-3">Create a last minute promotion to maximize</p>
          <button class="bg-indigo-500 text-white px-4 py-2 rounded-md">
            <i class="fa-solid fa-plus mr-2"></i> Create
          </button>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection
