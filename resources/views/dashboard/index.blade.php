@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-50">
  @include('partials.dash.sidebar')

  <div class="flex-1 flex flex-col">
    @include('partials.dash.topbar')

    <main class="p-6 flex-1 overflow-y-auto">
      <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">My Bookings</h1>
        <div class="flex items-center gap-3">
          <div class="flex items-center gap-2 text-sm text-slate-600">
            <i class="fa-regular fa-calendar"></i>
            <input type="text" class="border border-gray-200 rounded px-2 py-1"
                   value="{{ now()->format('m/d/Y') }}" readonly>
          </div>
          <button class="inline-flex items-center gap-2 bg-emerald-500 text-white px-3 py-2 rounded-md text-sm">
            <i class="fa-solid fa-download"></i> Download report
          </button>
        </div>
      </div>

      {{-- Period overview --}}
      <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div class="flex items-center justify-between">
          <h2 class="text-lg font-semibold">Period overview</h2>
          <div class="flex gap-2 text-sm text-slate-500">
            <button class="px-3 py-1.5 rounded-md bg-slate-100">Today</button>
            <button class="px-3 py-1.5 rounded-md hover:bg-slate-100">Earned</button>
          </div>
        </div>
        <div class="mt-4 h-40 rounded-md bg-slate-50 border border-slate-100 grid place-items-center text-slate-400">
          [Chart placeholder]
        </div>
      </div>

      <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        {{-- Arriving today --}}
        <div class="xl:col-span-2 bg-white rounded-lg shadow p-6">
          <div class="flex items-center justify-between mb-3">
            <h2 class="text-lg font-semibold">Arriving today</h2>
            <a href="#" class="text-indigo-600 text-sm font-medium">Show all →</a>
          </div>

          <ul class="space-y-3 text-sm">
            <li class="flex items-center justify-between">
              <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1 text-green-600"><i class="fa-solid fa-circle-check"></i> Approved</span>
                <span>Valencia apartment · $580 · 12:00</span>
              </div>
            </li>
            <li class="flex items-center justify-between">
              <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1 text-amber-600"><i class="fa-solid fa-clock"></i> Pending</span>
                <span>Night swimming pool · $1000 · 22:00</span>
              </div>
            </li>
            <li class="flex items-center justify-between">
              <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1 text-green-600"><i class="fa-solid fa-circle-check"></i> Approved</span>
                <span>Unique & Cozy studio · $384 · 16:40</span>
              </div>
            </li>
          </ul>
        </div>

        {{-- Low occupancy --}}
        <div class="bg-white rounded-lg shadow p-6">
          <h2 class="text-lg font-semibold mb-2">Low occupancy?</h2>
          <p class="text-gray-600 text-sm mb-4">Create a last minute promotion to maximize</p>
          <button class="bg-indigo-600 text-white px-4 py-2 rounded-md inline-flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Create
          </button>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection
