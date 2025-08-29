<header class="flex justify-between items-center px-6 py-4 bg-white border-b">
  <div class="flex items-center w-full max-w-md">
    <i class="fa-solid fa-magnifying-glass text-gray-500 mr-2"></i>
    <input type="text" placeholder="Search pages, editors..."
           class="w-full border border-gray-200 rounded-md px-3 py-1.5 focus:ring focus:ring-indigo-200 focus:border-indigo-400">
  </div>
  <div class="flex items-center gap-5">
    <button class="relative">
      <i class="fa-regular fa-bell w-6 h-6 text-gray-600"></i>
      <span class="absolute -top-0.5 -right-0.5 block w-2 h-2 bg-red-500 rounded-full"></span>
    </button>
    <div class="flex items-center gap-2">
      <img src="https://i.pravatar.cc/40" alt="profile" class="w-8 h-8 rounded-full">
      <span class="text-sm text-gray-700">{{ auth()->user()->username ?? 'user' }}</span>
    </div>
  </div>
</header>
